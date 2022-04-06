<?php

include("codectrl.php");


class ParentClass {
        public function __construct()
        {
                $this->_child = new ChildClass($this);
                (new Codectrl)->log(message:"log test", end_f:20, start_f:1, debugging:1);
        }
}

class ChildClass {
        public function __construct(ParentClass $p)
        {
                $this->_parent = $p;
        }
}

$test = new ParentClass();
?>
