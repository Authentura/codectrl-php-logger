<?php

include("src/CBOR/CBOREncoder.php");
include("src/CBOR/Types/CBORByteString.php");

class CodeCTRLformatter
{
    function getTrace()
    {
        $fileName = 'null';
        $function_name = 'null';
        $line_number = 0;


        $backtrace = debug_backtrace();
        if (!empty($backtrace[2]) && is_array($backtrace[2])) {
            $fileName = $backtrace[2]['file'];
            $function_name = $backtrace[2]['function'];
            $line_number = $backtrace[2]['line'];
        }

        $code_line  = (new CodeCTRLformatter)->GetContentOnLine($fileName, $line_number);
        $stack_array =   array(
            "name" => $function_name,
            "file_path" => $fileName,
            "line_number" => $line_number,
            "column_number" => 1,
            "code" => $code_line
        );

        return $stack_array;
    }

    static function GetContentOnLine($filepath, $lineNumber)
    {
        $lines = file($filepath);
        return $lines[$lineNumber - 1];
    }

    function getCodeArray($start, $end, $filename)
    {
        $code_snipets = array();

        if ($start > $end) {
            return array(
                "1" => "// line start was larger than the start line",
                "2" => "// please check the warnings."
            );
        }

        for ($x = $start; $x <= $end; $x++) {
            $code_snipets[$x] = CodeCTRLformatter::GetContentOnLine($filename, $x);
        }

        return $code_snipets;
    }
}

class CodeCTRL
{
    public function log()
    {
        $ip = "127.0.0.1";
        $port = 3001;

        $traceOutput =  (new CodeCTRLformatter)->getTrace();
        $codes = (new CodeCTRLformatter)->getCodeArray(1, 5, $traceOutput['file_path']);
        $message = "working on...";
        $schema = CodeCTRL::buildObject($traceOutput, $codes, $traceOutput['line_number'], $message);
        $target = json_encode($schema);

        echo $target; // display the target for debugging

        $encoded_data = \CBOR\CBOREncoder::encode($target);
        $byte_arr = unpack("C*", $encoded_data);
        $finalPayload = implode(" ", array_map(function ($byte) {
            return "0x" . strtoupper(dechex($byte));
        }, $byte_arr)) . PHP_EOL;

        (new CodeCTRL)->SendMessageToServer($ip, $port, $finalPayload);
    }

    static function buildObject($stack, $codeSnippet, $line_number, $message)
    {
        $target =  array(
            "stack" => [$stack],
            "line_number" => $line_number,
            "code_snippet" => $codeSnippet,
            "message" => $message
        );

        return $target;
    }

    /*
    TO MAKE THE SOCKET CONNECTION WORK YOU NEED TO UNABLE SOCKET CONENCTION ON PHP
    https://www.php.net/manual/en/intro.sockets.php
    https://www.php.net/manual/en/sockets.installation.php

    in the php.ini file you should see a commented line called `extension=sockets` uncomment that 
    */

    function SendMessageToServer($ip, $port, $message)
    {
        $sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("Cannot create a socket");
        socket_connect($sock, $ip, $port) or die("Could not connect to the socket");
        socket_write($sock, $message);
    }
}
