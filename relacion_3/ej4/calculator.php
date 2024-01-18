<?php
if (isset($_GET["num1"]) && isset($_GET["num2"]) && isset($_GET["opers"])) {
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $oper = $_GET["opers"];

    if (is_numeric($num1) && is_numeric($num2)) {
        if ($oper == "sum") {
            $sum_result = $num1 + $num2;
            echo "El resultado de la suma es: " . $sum_result;
        } elseif ($oper == "rest") {
            $rest_result = $num1 - $num2;
            echo "El resultado de la resta es: " . $rest_result;
        } elseif ($oper == "mult") {
            $mult_result = $num1 * $num2;
            echo "El resultado de la multiplicación es: " . $mult_result;
        } elseif ($oper == "div") {
            if ($num1 == 0 or $num2 == 0) {
                echo "No es posible dividir entre 0";
            } else {
                $div_result = $num1 / $num2;
                echo "El resultado de la división es: " . $div_result;
            }
        }
    } else {
        echo "Por favor, introduce los valores pedidos.";
    }
} else {
    echo "No has escrito nada.";
}