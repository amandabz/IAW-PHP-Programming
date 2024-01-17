<?php
// Ej 5 Relacion 1
$first_number = readline("Introduce el primer numero: ");
$second_number = readline("Introduce el segundo numero: ");
$third_number = readline("Introduce el tercer numero: ");

$numbers = array($first_number, $second_number, $third_number);

echo 'El numero mayor es el '.max($numbers)."\n";