--TEST--
Testing implicit interfaces - static
--FILE--
<?php

interface SimpleInterface {
    function simpleFunction();
}

class A {
    function simpleFunction() {}
}

class B {
    function simpleFunction() {}
}

class C {
    static function simpleFunction() {}
}

function c($d): SimpleInterface {
    return $d;
}

var_dump(get_class(c(new A())));
var_dump(get_class(c(new B())));
var_dump(get_class(c(new C())));

?>
--EXPECTF--
string(1) "A"
string(1) "B"

Fatal error: Uncaught TypeError: Return value of c() must implement interface SimpleInterface, instance of C returned in %s
Stack trace:
#0 %s c(Object(C))
#1 {main}
  thrown in %s on line %d
