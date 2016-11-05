--TEST--
no longer support basic binary nowdoc syntax
--FILE--
<?php

require_once 'nowdoc.inc';

print b<<<'ENDOFNOWDOC'
This is a nowdoc test.

ENDOFNOWDOC;

$x = b<<<'ENDOFNOWDOC'
This is another nowdoc test.

ENDOFNOWDOC;

print "{$x}";

?>
--EXPECTF--
Parse error: syntax error, unexpected '<<<'ENDOFNOWDOC'%A' (T_START_HEREDOC) in %s
