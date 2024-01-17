<?php
// Ej2 Relación 2
// Muestra la tabla de multiplicar de un número introducido por teclado.
$var = readline("Introduce un numero: ");
$i = 0;

while ($i <= 10) {
    $solucion = $var * $i;
    echo "$var x $i = $solucion\n";
    $i += 1;
}
