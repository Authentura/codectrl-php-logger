codeCTRL (php)
===============

A php library for the [codeCTRL](https://github.com/pwnCTRL/codeCTRL) logger.

The `codectrl.log` function collects and formats information about
the file/function/line of code it got called on and sends it to
the codeCTRL server, if available.

Installation
------------

### Manual install

Download the Logger from our Git-Hub [Release](https://github.com/Authentura/codectrl-php-logger/releases),
and include the logger file in the project where you want to use logger

### Composer

if you are using Composer  you can install the logger using

```
composer install codectrl-php
```
> havent published yet so wont work 


Usage
-----
Make sure you have the [codeCTRL](https://github.com/pwnCTRL/codeCTRL) application running.

Anywhere inside your php codebase you can insert `(new Codectrl)->log();` to print logs to the codeCTRL app.

> Keyword argument are not supported currently but will be supported soon

Keyword arguments, other than "reserved" ones, get appended

### Reserved arguments:
* host:
  By default set to `127.0.0.1`, this argument holds the address of the codeCTRL server.

* port:
  By default set to `3001`, this is the port the codeCTRL server should be contacted at.

* surround:
  By default `3`, this argument specifies the number of lines of code that should be displayed around the call to `codectrl.log`.


Usage Example
-------------

```php
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
```
