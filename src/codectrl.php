<?php

use Codectrl\Data\Log\Log as Log;
use Codectrl\Data\Backtrace_data\BacktraceData;
use Codectrl\Logs_service\LogClientClient;

require "../vendor/autoload.php";

@include_once dirname(__FILE__) . "/protos/Codectrl/Data/Log/Log.php";
@include_once dirname(__FILE__) .
    "/protos/Codectrl/Logs_service/LogClientClient.php";
@include_once dirname(__FILE__) . "/protos/GPBMetadata/Log.php";
@include_once dirname(__FILE__) .
    "/protos/Codectrl/Data/Backtrace_data/BacktraceData.php";
@include_once dirname(__FILE__) . "/protos/GPBMetadata/BacktraceData.php";

class CodeCTRLformatter
{
    function getTrace(): BacktraceData
    {
        $fileName = "null";
        $function_name = "null";
        $line_number = 0;

        $backtrace = debug_backtrace();
        if (!empty($backtrace[2]) && is_array($backtrace[2])) {
            $fileName = $backtrace[2]["file"];
            $function_name = $backtrace[2]["function"];
            $line_number = $backtrace[2]["line"];
        }

        $code_line = (new CodeCTRLformatter())->GetContentOnLine(
            $fileName,
            $line_number
        );

        // create backtraceData
        $backtraceData = new BacktraceData();
        $backtraceData->setName($function_name);
        $backtraceData->setFilePath($fileName);
        $backtraceData->setLineNumber($line_number);
        $backtraceData->setColumnNumber(1);
        $backtraceData->setCode($code_line);

        return $backtraceData;
    }

    static function GetContentOnLine($filepath, $lineNumber)
    {
        $lines = file($filepath);
        // replace \n new lines of the file. because otherwise formatting of the code in CodeCTRL wont look nice
        return trim(preg_replace("/\s\s+/", " ", $lines[$lineNumber - 1]));
    }

    function getCodeArray($start, $end, $filename)
    {
        $code_snipets = [];

        if (($start > $end) | ($start < 0)) {
            return [
                "1" => "// there was a conflic between start and end lines",
                "2" => "// please check the warnings.",
            ];
        } elseif ($start < 0) {
            $start = 1;
        }

        for ($x = $start; $x <= $end; $x++) {
            $code_snipets[$x] = CodeCTRLformatter::GetContentOnLine(
                $filename,
                $x
            );
        }

        return $code_snipets;
    }
}

class CodeCTRL
{
    private $batchHost;
    private $batchPort;

    /**
     * Creates a new `Logger` with a pre-defined log batch, hostname and port.
     *
     * @param { string } host - The hostname/IP/domain of the remote CodeCTRL server for this batch to be sent to.
     * @param { string } port - The port that the remote CodeCTRL server is listening on.
     */
    function __construct($host = "127.0.0.1", $port = 3002)
    {
        $this->batchHost = $host;
        $this->batchPort = $port;
    }

    /*
     * Creates the server Connection
     *
     * @param { string | null } host - The host of the CodeCTRL instance.
     *
     * @param { string | null } port - The port of the CodeCTRL instance.
     */
    private function createServerConnection($host, $port): LogClientClient
    {
        return new LogClientClient(($hostname = "{$host}:{$port}"), [
            "credentials" => Grpc\ChannelCredentials::createInsecure(),
        ]);
    }

    /**
     * The basic log function.
     *
     * @param { string | any } message - The message to be
     * sent to the logger. Accepts any
     *
     * @param { number | null } surround - The amount of surrounding code to
     * include in the code snippet. default to 3
     *
     * @param { string | null } host - The host of the CodeCTRL instance.
     *
     * @param { string | null } port - The port of the CodeCTRL instance.
     *
     */
    public function log(
        $message = "",
        $surround = 3,
        $host = "127.0.0.1",
        $port = 3002
    ) {
        $traceOutput = (new CodeCTRLformatter())->getTrace();
        $log = $this->logBuilder($traceOutput, $surround, $message);

        $client = $this->createServerConnection($host, $port);
        $client->SendLog($log);
    }

    /*
     * Builds the Log object and returns
     *
     * @returns Log
     */
    private function logBuilder($traceOutput, $surround, $message): Log
    {
        $codes = (new CodeCTRLformatter())->getCodeArray(
            $traceOutput->getLineNumber() - $surround,
            $traceOutput->getLineNumber() + $surround,
            $traceOutput->getFilePath()
        );


        // build the log object
        $log = new Log();
        $log->setUuid("");
        $log->setStack([$traceOutput]);
        $log->setCodeSnippet($codes);
        $log->setLineNumber($traceOutput->getLineNumber());
        $log->setMessage($message);
        $log->setMessageType(gettype($message));
        $log->setFileName($traceOutput->getFilePath());
        $log->setWarnings([]);
        $log->setLanguage("PHP");

        return $log;
    }
}
