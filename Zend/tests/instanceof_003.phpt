--TEST--
Testing instanceof operator with class and implicit interface
--FILE--
<?php 

interface ITest {
    function test();
}

interface IFoo extends ITest {
    function foo();
}

class foo extends stdClass {
    function test() {

    }
}

var_dump(new foo instanceof stdClass);
var_dump(new foo instanceof ITest);
var_dump(new foo instanceof IFoo);

class bar extends foo {
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
