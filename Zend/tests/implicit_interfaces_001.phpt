--TEST--
Testing implicit interfaces - empty/arg
--FILE--
<?php

interface EmptyInterface {

}

class A {

}

class B {
    function test() {}
}

function c(EmptyInterface $d) {
    var_dump(get_class($d));
}

c(new A());
c(new B());

?>
--EXPECT--
string(1) "A"
string(1) "B"
