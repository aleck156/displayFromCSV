<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root.'app'.DIRECTORY_SEPARATOR);
define('FILES_PATH', $root.'transaction_files'.DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root.'views'.DIRECTORY_SEPARATOR);

require_once '../app/App.php';
require_once APP_PATH.'helpers.php';
// require_once APP_PATH.'App.php';

$files = getTransactionFiles(FILES_PATH);

$transactions = [];

foreach($files as $file) {
  $transactions = array_merge($transactions, getTransactions($file, 'extractTransaction'));
}

$totals = calculateTotals($transactions);

require_once VIEWS_PATH.'transactions.php';

// echo '<pre>';
// var_dump($files);
// echo '</pre>';

// echo '<pre>';
// var_dump($transactions);
// echo '</pre>';