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
    $transactions[] = extractTransaction($transaction);
  }

  return $transactions;
}

function extractTransaction(array $transactionRow): array{
  [$date, $checknumber, $description, $amount] = $transactionRow;
  $amount = (float) str_replace(['$', ','], '', $amount);

  return [
    'date' => $date,
    'checkNumber' => $checknumber,
    'description' => $description,
    'amount' => $amount
  ];
}