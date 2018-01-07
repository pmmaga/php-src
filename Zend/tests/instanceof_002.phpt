--TEST--
Testing instanceof operator with class and interface inheriteds
--FILE--
<?php 

interface ITest {
    function test();
}

interface IFoo extends ITest {
    function foo();
}

class foo extends stdClass implements ITest {
    function test() {

    }
}

var_dump(new foo instanceof stdClass);
var_dump(new foo instanceof ITest);
var_dump(new foo instanceof IFoo);

class bar extends foo implements IFoo {
    function foo() {
        
    }
}

var_dump(new bar instanceof stdClass);
var_dump(new bar instanceof ITest);
var_dump(new bar instanceof IFoo);

?>
--EXPECT--
bool(true)
bool(true)
bool(false)
bool(true)
bool(true)
bool(true)
