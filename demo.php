<?php

class CodeCTRL
{
    function getTrace()
    {
        $result = var_export(debug_backtrace(), true);
        return $result;
    }

    public function log()
    {
        $traceOutput =  (new CodeCTRL)->getTrace();
        echo $traceOutput;
    }
}


function exampleTestForCodectrl()
{
    echo "helloword";
    (new Codectrl)->log();
}

exampleTestForCodectrl();
