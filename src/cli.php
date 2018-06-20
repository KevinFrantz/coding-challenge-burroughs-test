<?php

use repository\SalesRepository;

require __DIR__. '/vendor/autoload.php';

const DATA_DIRECTORY = '../testdata/';

print(shell_exec('php -d memory_limit=128M vendor/bin/phpunit'));

/**
 * Load data
 */

$data = new SalesRepository(DATA_DIRECTORY);
?>
