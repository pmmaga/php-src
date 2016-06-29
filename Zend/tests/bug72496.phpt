--TEST--
Bug #72496 (declare public method with signature incompatible with parent private method should not throw a warning)
--FILE--
<?php
class Foo
{
    private function getName()
    {
        return 'John';
    }
}

class Bar extends Foo
{
    public function getName($extraArgument)
    {
        return $extraArgument;
    }
}

echo "OK\n";
--EXPECT--
OK
