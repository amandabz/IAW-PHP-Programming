<?php
// Usando la librería del ejercicio 1. Muestra los números capicúa que hay entre 1 y 99999.
include 'ej1.php';

echo "Números primos entre el 1 y el 99999:\n";

for ($numero = 1; $numero <= 99999; $numero++) {
    if (esCapicua($numero)) {
        echo $numero . "\n";
    }
}