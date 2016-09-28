--TEST--
Ensure private methods with the same name do not enforce overriding rules
--FILE--
<?php

class A {
    function callYourPrivates() {
        $this->normalPrivate();
        $this->finalPrivate();
    }
    function notOverriden_callYourPrivates() {
        $this->normalPrivate();
        $this->finalPrivate();
    }
    private function normalPrivate() {
        echo __METHOD__ . PHP_EOL;
    }
    final private function finalPrivate() {
        echo __METHOD__ . PHP_EOL;
    }
}

class B extends A {
    function callYourPrivates() {
        $this->normalPrivate();
        $this->finalPrivate();
    }
    private function normalPrivate() {
        echo __METHOD__ . PHP_EOL;
    }
    final private function finalPrivate() {
        echo __METHOD__ . PHP_EOL;
    }
}

$a = new A();
$a->callYourPrivates();
$a->notOverriden_callYourPrivates();

$b = new B();
$b->callYourPrivates();
$b->notOverriden_callYourPrivates();
--EXPECT--
A::normalPrivate
A::finalPrivate
A::normalPrivate
A::finalPrivate
B::normalPrivate
B::finalPrivate
A::normalPrivate
A::finalPrivate
