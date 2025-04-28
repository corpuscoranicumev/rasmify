<?php

require('Rasmify.php');
use CCev\Rasmify;

$inputFile = file_get_contents("./data/quran_text_original.csv");

$output = "";

$lines = explode("\n", $inputFile);

foreach($lines as $line)
{
    $wordData = explode("\t", $line);

    $arab = $wordData[4];

    $rasm = Rasmify::rasmify($arab);

    $output .= $line . "\t" . $rasm . "\n";

}

//file_put_contents(getcwd(), "/data/quran_text_rasm.csv", $output);
$outputFile = fopen("./data/quran_text_rasm.csv", "w");
fwrite($outputFile, $output);
fclose($outputFile);