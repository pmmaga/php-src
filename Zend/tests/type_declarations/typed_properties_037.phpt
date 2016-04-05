--TEST--
Test typed properties var_dump uninitialized
--FILE--
<?php
$foo = new class {
	public int $bar = 10, $qux;
};

var_dump($foo);
--EXPECTF--
object(class@anonymous)#%d (%d) {
  ["bar"]=>
  int(10)
  ["qux"]=>
  uninitialized(integer)
}

