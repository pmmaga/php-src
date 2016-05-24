--TEST--
Proper source duplication on assignment to typed property
--INI--
opcache.enable=0
opcache.enable_cli=0
--FILE--
<?php
class Foo {
	public int $bar;
}

$foo = new Foo();

for ($i = 0; $i < 5; $i++) {
	$foo->bar = "5";
	var_dump($foo->bar);
}
?>
--EXPECT--
int(5)
int(5)
int(5)
int(5)
int(5)