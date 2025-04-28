<?php

require_once 'vendor/autoload.php';
use CCev\Rasmify;

$arabicString = 'بِسْمِ  ٱللَّهِ  ٱلرَّحْمَٰنِ  ٱلرَّحِيمِ';
$rasmified = Rasmify::rasmify($arabicString);

echo $rasmified . "\n";
?>