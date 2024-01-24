<?php
// Crea una biblioteca de funciones matemáticas que contenga las siguientes
// funciones. Recuerda que puedes usar unas dentro de otras si es necesario.
// a. esCapicua: Devuelve verdadero si el número que se pasa como parámetro es capicúa y falso en caso contrario.
// b. esPrimo: Devuelve verdadero si el número que se pasa como parámetro es primo y falso en caso contrario.

$n = readline("Escribe un numero para comprobar si es primo o no: ");

function esPrimo($numero) {
    $esPrimo = true;

    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false;
            break;
        }
    }
    if ($numero == 0 || $numero == 1) {
        $esPrimo = false;
    }

    return $esPrimo;
}

if (esPrimo($n)) {
    echo "El $n es primo.\n";
} else {
    echo "El $n no es primo.\n";
}

