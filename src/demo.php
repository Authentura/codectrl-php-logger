<?php

use Codectrl\Data\Log\Log;

require "codectrl.php";

@include_once dirname(__FILE__) . './protobuf/Codectrl/Data/Log/Log.php';
@include_once dirname(__FILE__) . './protobuf/GPBMetadata/Log.php';


class ParentClass
{
    public function __construct()
    {
        $this->_child = new ChildClass($this);
        (new Codectrl)->log(message: "log test", surround: 5, debugging: 1);
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
