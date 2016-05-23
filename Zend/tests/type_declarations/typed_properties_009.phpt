--TEST--
Test typed properties unset leaves properties in an uninitialized state
--FILE--
<?php
class Foo {
	public int $bar;

	public function __get($name) {
		var_dump($name);
		/* implicit return null, weakly cast to int(0) */
	}
}

$foo = new Foo();

unset($foo->bar);

var_dump($foo->bar);
?>
--EXPECTF--
string(3) "bar"
int(0)
