<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root.'app'.DIRECTORY_SEPARATOR);
define('FILES_PATH', $root.'transaction_files'.DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root.'views'.DIRECTORY_SEPARATOR);

require_once '../app/App.php';
// require_once APP_PATH.'App.php';

$files = getTransactionFiles();

echo '<pre>';
var_dump($files);
echo '</pre>';