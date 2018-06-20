<?php

require __DIR__. '/vendor/autoload.php';
print(shell_exec('php -d memory_limit=128M vendor/bin/phpunit'));

echo "Hello World!";

?>
