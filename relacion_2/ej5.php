<?php
// Ej 5 Relación 2
/* Define tres arrays de 20 números enteros cada una, con nombres “número”, “cuadrado” y “cubo”. Carga el array “numero”
con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben almacenar los cuadrados de los valores que hay en el
array “numero”. En el array “cubo” se deben almacenar los cubos de los valores que hay en “número”.
A continuación, muestra el contenido de los tres arrays dispuestos en tres columnas.
 */
$numero = array();
$cuadrado = array();
$cubo = array();

// numeros aleatorios
for ($i = 0; $i < 20; $i++) {
    $numero[$i] = rand(0, 100);
}

for ($i = 0; $i < 20; $i++) {
    // calcula el cuadrado
    $cuadrado[$i] = $numero[$i] ** 2;

    // calcula el cubo
    $cubo[$i] = $numero[$i] ** 3;
}

// mostramos las tablas en 3 columnas
echo "Numero | Cuadrado | Cubo\n";
for ($i = 0; $i < 20; $i++) {
    echo "$numero[$i] | $cuadrado[$i] | $cubo[$i]\n";
}