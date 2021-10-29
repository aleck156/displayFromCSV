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

}