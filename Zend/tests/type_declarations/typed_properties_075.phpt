--TEST--
Test typed properties overflowing
--FILE--
<?php

class Foo {
	public static int $bar = PHP_INT_MAX;
};

try {
	Foo::$bar++;
} catch(TypeError $t) {
	var_dump($t->getMessage());
}

var_dump(Foo::$bar);

try {
	Foo::$bar += 1;
} catch(TypeError $t) {
	var_dump($t->getMessage());
}

var_dump(Foo::$bar);

try {
	++Foo::$bar;
} catch(TypeError $t) {
	var_dump($t->getMessage());
}

var_dump(Foo::$bar);

try {
	Foo::$bar = Foo::$bar + 1;
} catch(TypeError $t) {
	var_dump($t->getMessage());
}

var_dump(Foo::$bar);

?>
--EXPECTF--
string(48) "Typed property Foo::$bar must be int, float used"
int(9223372036854775807)
string(48) "Typed property Foo::$bar must be int, float used"
int(9223372036854775807)
string(48) "Typed property Foo::$bar must be int, float used"
int(9223372036854775807)
string(48) "Typed property Foo::$bar must be int, float used"
int(9223372036854775807)

