<?php

declare(strict_types=1);

function getTransactionFiles(string $dirpath): array{
  $files = [];

  foreach(scandir($dirpath) as $file) {
    if (is_dir($file)){
      continue;
    }

    $files[] = $dirpath.$file;

    return $files;
  };
}

function getTransactions(string $fileName): array{
  if (!file_exists($fileName)){
    trigger_error("File {$fileName} does not exist.", E_USER_ERROR);
  }
  $file = fopen($fileName, 'r');
  $transactions = [];

  fgetcsv($file);

  while (($transaction = fgetcsv($file)) !== false){
    $transactions[] = $transaction;
  }

  return $transactions;
}

require_once VIEWS_PATH.'transactions.php';