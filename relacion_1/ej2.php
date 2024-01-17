<?php
// Ej 2 Relacion 1
$number = readline("Introduce un numero entero: ");

echo "Numero: ".$number."\n";

if ($number == 0) {
    echo "El numero es 0.\n";
} elseif ($number > 0) {
    echo "El numero es positivo.\n";
} else {
    echo "El numero es negativo.\n";
}
