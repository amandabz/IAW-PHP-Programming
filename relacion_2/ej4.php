<?php
// Ej 4 Relación 2
/* Escribe un programa que muestre los primeros términos de la serie de Fibonacci. El primer término de la serie de Fibonacci es 0,
el segundo es 1 y el resto se calcula sumando los dos anteriores, por lo que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8,
13, 21, 34, 55, 89, 144... El número n se debe introducir por teclado. */
$n = readline("Introduce un numero: ");
$var1 = 0;
$var2 = 1;

for ($i=0; $i < $n; $i++) {
    $temp = $var1;
    $var1 = $var2;
    $var2 = $temp + $var1;

    echo $var1 . "\n";
}

