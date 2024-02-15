<?php
session_start();
// Dos jugadores están jugando a las cartas, gana el jugador que saque la carta más alta, siendo la más baja el 1 o as y la
// más alta la 10.
//Escriba un programa de dos páginas (usando variables de sesión) que muestre una carta para cada jugador y se indique qué
//jugador es el ganador y permita repetir la jugada mediante un botón.

if (isset($_POST['submit'])) {
    header("Location: pg2.php");
}

// numero de las cartas
$numero_carta_1 = rand(1,10);
$numero_carta_2 = rand(1,10);

// palos de las cartas
$palos = Array('c', 'd', 'p', 't');
$palo_jugador_1 = $palos[(rand(0,3))];
$palo_jugador_2 = $palos[(rand(0,3))];

// cartas completas
$carta_jugador_1 = "$palo_jugador_1". "$numero_carta_1";
$carta_jugador_2 = "$palo_jugador_2". "$numero_carta_2";

print "<p>\n";
print "<img src=./cartas/$carta_jugador_1.svg width='200' height='200'>" ;
print "<img src=./cartas/$carta_jugador_2.svg width='200' height='200'>" ;
print "</p>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Juego de Cartas (Sesiones)</title>
</head>
<body>
<form method="post" action="pg2.php">
    <label for="carta_jugador_1">Jugador 1:</label>
    <?php echo $carta_jugador_1; ?>
    <br>
    <label for="carta_jugador_2">Jugador 2:</label>
    <?php echo $carta_jugador_2; ?>
    <br>
    <br>
    <input type="submit" name="submit" value="Ganador">
</form>
</body>
</html>
