<?php

require "codectrl.php";


class ParentClass
{
    public function __construct()
    {
        $test = 1 + 2;
        print $test;
        (new Codectrl())->log(message: "log from codectrl", surround: 5);
    }
}

$test = new ParentClass();
