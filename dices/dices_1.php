<?php
/**
 * dices_1.php
 *
 * @author Amanda Benítez Hidalgo
 *
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>
        Dos dados.
        if .. elseif ... else ... (1). Sin formularios.
        Amanda Benítez Hidalgo
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<h1>Dos dados</h1>
<p>Actualice la página para mostrar una nueva tirada.</p>

<?php
$dado1 = rand(1,6);
$dado2 = rand(1,6);

print "<p>\n";
print "<img src=./img/$dado1.svg width='200' height='200'>" ;
print "<img src=./img/$dado2.svg width='200' height='200'>" ;
print "</p>";

if ($dado1 == $dado2) {
    print "<p>Pareja de $dado1";
} else {
    print "Sin pareja, el valor más alto es: ". max($dado1,$dado2);
}
?>
<footer>
    <p>Amanda Benítez Hidalgo</p>
</footer>
</body>
</html>