<?php
// Ej 7 Relación 1
$age = readline("Introduce tu edad: ");
$carnet = readline("Introduce si tienes carnet de conducir o no (S/N): ");

if ($age >= 18) {
    if ($carnet == "S") {
        echo "Puedes conducir.\n";
    } else {
        echo "No puedes conducir.\n";
    }
} else {
    echo "No puedes conducir.\n";
}