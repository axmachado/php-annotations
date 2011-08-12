<?php
## Configure PHP include paths
set_include_path(
	get_include_path() . PATH_SEPARATOR .
	__DIR__ . DIRECTORY_SEPARATOR . 'lib' . PATH_SEPARATOR .
	__DIR__ . DIRECTORY_SEPARATOR . 'test' . DIRECTORY_SEPARATOR . 'lib' . PATH_SEPARATOR .
	__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR
);

## Configure a simple auto-loader
require 'demo/SplClassLoader.php';

$loader = new SplClassLoader(null, 'application');
$loader->register();
$loader2 = new SplClassLoader(null, 'test/lib');
$loader2->register();

$runner = new xTestRunner(__DIR__ . DIRECTORY_SEPARATOR . 'lib');
$runner->run(__DIR__ . DIRECTORY_SEPARATOR . 'suite' . DIRECTORY_SEPARATOR . '*.test.php');