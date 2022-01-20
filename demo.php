<?php

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
            "column_number" => 0,
            "code" => $code_line
        );

        echo json_encode($stack_array);
    }

    function GetContentOnLine($filepath, $lineNumber)
    {
        $lines = file($filepath);
        return $lines[$lineNumber - 1];
    }
}
class CodeCTRL
{
    public function log()
    {
        $traceOutput =  (new CodeCTRLformatter)->getTrace();
        //echo $traceOutput;
    }
}


function exampleTestForCodectrl()
{
    //echo "helloword\n";
    (new Codectrl)->log();
}

exampleTestForCodectrl();
