--TEST--
Test array promotion does not violate type restrictions
--FILE--
<?php

class Foo {
	public ?string $p;
	public ?iterable $i;
	public static ?string $s;
	public static ?array $a;
}

$a = new Foo;

$a->i[] = 1;
var_dump($a->i);

try {
	$a->p[] = "test";
} catch (TypeError $e) { var_dump($e->getMessage()); }
try { // must be uninit
	var_dump($a->p);
} catch (TypeError $e) { var_dump($e->getMessage()); }

Foo::$a["bar"] = 2;
var_dump(Foo::$a);

try {
	Foo::$s["baz"][] = "baz";
} catch (TypeError $e) { var_dump($e->getMessage()); }
try { // must be uninit
	var_dump(Foo::$s);
} catch (TypeError $e) { var_dump($e->getMessage()); }

Foo::$a = null;
$ref = &Foo::$a;
$ref[] = 3;
var_dump($ref);

$ref = &$a->p;
try {
	$ref[] = "bar";
} catch (TypeError $e) { var_dump($e->getMessage()); }
var_dump($ref);

try {
	$ref["baz"][] = "bar"; // indirect assign
} catch (TypeError $e) { var_dump($e->getMessage()); }
var_dump($ref);

?>
--EXPECT--
array(1) {
  [0]=>
  int(1)
}
string(79) "Cannot write an array to a null property Foo::$p which does not allow for array"
string(65) "Typed property Foo::$p must not be accessed before initialization"
array(1) {
  ["bar"]=>
  int(2)
}
string(79) "Cannot write an array to a null property Foo::$s which does not allow for array"
string(72) "Typed static property Foo::$s must not be accessed before initialization"
array(1) {
  [0]=>
  int(3)
}
string(97) "Cannot write an array to a null or false reference held by Foo::$p which does not allow for array"
NULL
string(97) "Cannot write an array to a null or false reference held by Foo::$p which does not allow for array"
NULL
