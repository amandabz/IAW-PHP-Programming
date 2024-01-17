<?php
if (isset($_GET["name"])) {
    echo
    "Hola, tú nombre es " . $_GET["name"];
} else {
    echo "No has escrito nada";
}
