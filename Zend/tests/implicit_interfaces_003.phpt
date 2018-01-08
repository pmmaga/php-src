--TEST--
Testing implicit interfaces - simple/arg
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
    function test() {}
}

class C {
    function test() {}
}

function c(SimpleInterface $d) {
    var_dump(get_class($d));
}

c(new A());
c(new B());
c(new C());

?>
--EXPECTF--
string(1) "A"
string(1) "B"

Fatal error: Uncaught TypeError: Argument 1 passed to c() must implement interface SimpleInterface, instance of C given, called in %s
Stack trace:
#0 %s c(Object(C))
#1 {main}
  thrown in %s
