--TEST--
Test typed properties disallow mixing typed and untyped declarations
--FILE--
<?php
class Foo {
	public int $bar,
				$qux;
}
?>
--EXPECTF--
Fatal error: Untyped property Foo::$qux must not be mixed with typed properties in %s on line 3





