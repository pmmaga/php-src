--TEST--
Testing implicit interfaces - empty/ret
--FILE--
<?php

interface EmptyInterface {

}

class A {

}

class B {
    function test() {}
}

function c($d): EmptyInterface {
    return $d;
}

var_dump(get_class(c(new A())));
var_dump(get_class(c(new B())));

?>
--EXPECT--
string(1) "A"
string(1) "B"
