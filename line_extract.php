#!/usr/bin/env php

<?php
$help = "\nUsage: line_extract.php {filename} [step]\n";
$help .= "\n\tReads filename, and extracts every x line into another file.\n\n";
$help .= "\n\tIf no step is specified, it defaults to 2.\n";
if (isset($argv[1])) {
  if ($argv[1] == "--help") {
    echo($help);
    exit();
  }

  if ($file = file($argv[1])) {
    if (isset($argv[2]) && !empty($argv[2])) {
      $step = $argv[2];
    }
    else {
      $step = 2;
    }
    $new_file = [];
    echo("This might take a while depending on file size, patience.\n");

    for ($i = $step; $i < count($file); $i = $i + $step) {
      $new_file[] = $file[$i];
    }
    file_put_contents($argv[1] . ".new", implode($new_file));
  }
}
else {
  echo($help . "\n");
}
