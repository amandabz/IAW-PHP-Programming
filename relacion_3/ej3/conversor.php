<?php

if (isset($_GET["dollars"])) {
    $dollars = $_GET["dollars"];

    if (is_numeric($dollars)) {
        $resultado = $dollars / 1.10;
        echo $dollars." dolar/es son " . $resultado." euros";
    } else {
        echo "Por favor, introduce la cantidad de dólares que quieres convertir.";
    }
} else {
    echo "No has escrito nada.";
}