--TEST--
Testing implicit interfaces - arg num
--FILE--
<?php

interface ComplexInterface {
    function complexFunction(string $a, string $b): int;
}

class A {
    function complexFunction(string $a, string $b): int {}
}

class B {
    function complexFunction(string $a, string $b, string $c = null): int {}
}

class C {
    function complexFunction(string $a): int {}
}

function c($d): ComplexInterface {
    return $d;
}

var_dump(get_class(c(new A())));
var_dump(get_class(c(new B())));
var_dump(get_class(c(new C())));

?>
--EXPECTF--
string(1) "A"
string(1) "B"

Fatal error: Uncaught TypeError: Return value of c() must implement interface ComplexInterface, instance of C returned in %s
Stack trace:
#0 %s c(Object(C))
#1 {main}
  thrown in %s on line %d
