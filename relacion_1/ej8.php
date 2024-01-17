<?php
// Ej 8 Relación 1
$lado1 = readline("Introduce la longitud (en cm) del primer lado del triangulo: ");
$lado2 = readline("Introduce la longitud (en cm) del segundo lado del triangulo: ");
$lado3 = readline("Introduce la longitud (en cm) del tercer lado del triangulo: ");

if ($lado1 == $lado2 and $lado1 == $lado3) {
    echo "El triángulo es equilátero\n";
} elseif ($lado1 == $lado2 or $lado1 == $lado3 or $lado2 == $lado3) {
    echo "El triángulo es isósceles\n";
} else {
    echo "El triángulo es escaleno\n";
}