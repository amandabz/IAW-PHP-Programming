<?php
// Crea una biblioteca de funciones matemáticas que contenga las siguientes
// funciones. Recuerda que puedes usar unas dentro de otras si es necesario.
// a. esCapicua: Devuelve verdadero si el número que se pasa como parámetro es capicúa y falso en caso contrario.
// b. esPrimo: Devuelve verdadero si el número que se pasa como parámetro es primo y falso en caso contrario.
function esCapicua($numero_capicua) {
    $cadena_normal = (string)$numero_capicua;
    $cadena_invertida = strrev($cadena_normal);

    return $cadena_normal === $cadena_invertida;
}


function esPrimo($numero_primo) {
    if ($numero_primo < 2) {
        return false;
    }

    for ($i = 2; $i * $i < $numero_primo; $i++) {
        if ($numero_primo % $i == 0) {
            return false;
        }
    }
    return true;
}





