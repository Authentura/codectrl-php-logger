<?

class CodeCTRL
{
    function getTrace()
    {
        $result = var_export(debug_backtrace(), true);
        return $result;
    }

    public function log()
    {
        $traceOutput = getTrace();
        echo $traceOutput;
    }
}
