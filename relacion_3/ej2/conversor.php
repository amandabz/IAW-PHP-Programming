<?php

if (isset($_GET["euros"])) {
    $euros = $_GET["euros"];

    if (is_numeric($euros)) {
        $resultado = $euros * 1.10;
        echo $euros." euro/s son " . $resultado." dolares";
    } else {
        echo "Por favor, introduce la cantidad de euros que quieres convertir.";
    }
} else {
    echo "No has escrito nada.";
}