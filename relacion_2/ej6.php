<?php
// Ej 6 Relación 2
/* Escribe un programa que genere 15 números aleatorios y que los almacene en un array. Rota los elementos de ese array,
es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. El número que se encuentra en la
última posición debe pasar a la posición 0. Finalmente, muestra el contenido del array del inicio y el array rotado. */
$lista = array();

for ($i = 0; $i < 15; $i++) {
    $lista[$i] = rand(0, 15);
}

echo $lista[15];
