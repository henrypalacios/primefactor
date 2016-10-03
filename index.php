<?php

require_once "FactorPrimo.php";

if (PHP_SAPI === 'cli') {
    $number = $argv[1];
}
else {
    $number = 600851475143;
    $number = (isset($_GET['number'])) ? $_GET['number'] : $number ;
}

$factorization = new FactorPrimo($number);

echo $factorization->calculate();