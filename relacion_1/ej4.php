<?php
// Ej 4 Relacion 1
$first_number = readline("Introduce el primer numero: ");
$second_number = readline("Introduce el segundo numero: ");

echo "Primer numero: ".$first_number."\n";
echo "Segundo numero: ".$second_number."\n";

if ($first_number == $second_number) {
    echo "Los numeros son iguales.\n";
} else {
    echo "Los numeros son diferentes.\n";
}
