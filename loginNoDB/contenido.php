<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo "Has inciado sesión correctamente con el usuario: $username";
    } else {
        header("Location: login.php");
    }
    ?>
    <br>
    <br>
    <a href="cerrarsesion.php">Cerrar sesión</a>
</body>
<html lang="en">


