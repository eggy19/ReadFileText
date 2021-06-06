<?php
$testfile = "hello.txt";
$file = fopen($testfile, "r");

if (!$file) {
    die("File TIdak ada");
}

// $filedata = fread($file, filesize($testfile));
while (!feof($file)) {
    echo fgets($file) . '<br>';
}

fclose($file);
