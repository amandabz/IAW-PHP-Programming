<?php
// Crea una biblioteca de funciones para arrays (de una dimensión) de números
// enteros que contenga las siguientes funciones:

// generar un array de tamaño n con números aleatorios en el intervalo [0, 100]
function generaArrayInt($n) {
    $array = array();
    for ($i = 0; $i < $n; $i++) {
        $array[] = rand(0, 100);
    }
    return $array;
}

// obtener el mínimo de un array
function minimoArrayInt($array) {
    return min($array);
}

// obtener el máximo de un array.
function maximoArrayInt($array) {
    return max($array);
}


