<?php
// Usando la librería del ejercicio 4. Muestra el número mínimo de un array de enteros
// de tamaño 10 generado aleatoriamente
include 'ej4.php';

$random_array = generaArrayInt(10);

print_r($random_array);
echo "Mínimo del array: " . minimoArrayInt($random_array) . "\n";


