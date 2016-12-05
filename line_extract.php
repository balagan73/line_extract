#!/usr/bin/env php

<?php

if (isset($argv[1])) {
  if ($argv[1] == "--help") {
    $help = "\nUsage: line_extract.php filename line_number\n";
    $help .= "\n\tReads filename, and extracts every x line into another file.\n\n";
    echo($help);
    exit();
  }

  if ($file = file($argv[1])) {
    $step = $argv[2];
    $new_file = [];
    echo("This might take a while depending on file size, patience.\n");

    for ($i = 0; $i < count($file); $i = $i + $step) {
      $new_file[] = $file[$i];
    }

    var_dump($file);
    echo(count($file) . "\n");
    echo("step: " . $step . "\n");
    file_put_contents($argv[1] . ".new", $new_file);
  }

}
else {
  echo("First parameter should be a file.\n");
}
