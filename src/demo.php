<?php

require "codectrl.php";


class ParentClass
{
    public function __construct()
    {
            $this->_child = new ChildClass($this);
            (new Codectrl)->log(message:"log test", surround:5, debugging:1);
    }
}

class ChildClass
{
    public function __construct(ParentClass $p)
    {
            $this->_parent = $p;
    }
}

$test = new ParentClass();
?>

