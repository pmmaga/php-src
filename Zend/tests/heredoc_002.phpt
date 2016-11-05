--TEST--
no longer support binary heredoc syntax
--FILE--
<?php

require_once 'nowdoc.inc';

print b<<<ENDOFHEREDOC
This is a heredoc test.

ENDOFHEREDOC;

$x = b<<<ENDOFHEREDOC
This is another heredoc test.

ENDOFHEREDOC;

print "{$x}";

?>
--EXPECTF--
Parse error: syntax error, unexpected '<<<ENDOFHEREDOC%A' (T_START_HEREDOC) in %s
