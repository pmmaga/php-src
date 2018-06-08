--TEST--
Bug 76430 - __METHOD__ inconsistent outside of method
--FILE--
<?php

const X = __METHOD__;
var_dump(X);

class A {
    const X = __METHOD__;
}
var_dump(A::X);

function doB() {
    class B {
        const X = __METHOD__;
    }
}
doB();
var_dump(B::X);

function c() {
    return __METHOD__;
}
var_dump(c());

$d = function() {
    return __METHOD__;
};
var_dump($d());

function e() {
    return function() {
        return __METHOD__;
    };
}
var_dump(e()());

class F {
    static function foo() {
        return function() {
            return __METHOD__;
        };
    }
}
var_dump(F::foo()());
?>
--EXPECT--
string(0) ""
string(0) ""
string(3) "doB"
string(1) "c"
string(9) "{closure}"
string(9) "{closure}"
string(9) "{closure}"
