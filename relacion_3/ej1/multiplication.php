<?php
if (isset($_GET["num1"]) && isset($_GET["num2"])) {
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    if (is_numeric($num1) && is_numeric($num2)) {
        $resultado = $num1 * $num2;
        echo "La multiplicación de ambos números es: " . $resultado;
    } else {
        echo "Por favor, introduce los dos números.";
    }
} else {
    echo "No has escrito nada.";
}