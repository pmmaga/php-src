--TEST--
Test typed properties delay type check on ast
--FILE--
<?php
class Foo {
	public int $bar = BAR::BAZ * 2;
}

$foo = new Foo();

var_dump($foo->bar);
?>
--EXPECTF--
Fatal error: Class 'BAR' not found in %s on line 6






