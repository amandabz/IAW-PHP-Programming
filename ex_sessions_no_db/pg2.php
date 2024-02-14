<?php
session_start();

if (isset($_POST['submit'])) {
    header("Location: pg1.php");
}

if (isset($_SESSION["carta_jugador_1"]) && isset($_SESSION["carta_jugador_2"])) {
    $carta_jugador_1 = $_SESSION["carta_jugador_1"];
    $carta_jugador_2 = $_SESSION["carta_jugador_2"];

    if ($carta_jugador_1 == $carta_jugador_2) {
        print "Cartas iguales. Empate.";
    } elseif ($carta_jugador_1 > $carta_jugador_2) {
        print "El ganador es el Jugador 1". $carta_jugador_1;
    } else {
        print "El ganador es el Jugador 2". $carta_jugador_2;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
<form method="post">
    <p>¿Quieres volver a jugar?</p>
    <input type="submit" name="submit" value="Repetir">
</form>
</body>
</html>
