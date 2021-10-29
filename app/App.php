<?php

declare(strict_types=1);

function getTransactionFiles(): array{
  $files = [];

  foreach(scandir(FILES_PATH) as $file) {
    if (is_dir($file)){
      continue;
    }

    $files[] = $file;

    echo '<pre>';
    var_dump($file);
    echo '</pre>';
  };
}