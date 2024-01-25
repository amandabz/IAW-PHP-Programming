<?php
// Usando la librería del ejercicio 1. Muestra los números primos que hay entre 1 y 1000.
include 'ej1.php';

echo "Números primos entre el 1 y el 1000:\n";

for ($numero = 1; $numero <= 1000; $numero++) {
    if (esPrimo($numero)) {
        echo $numero . "\n";
    }
}



