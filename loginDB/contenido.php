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

<?php
// Aquí tendremos que iniciar sesión y comprobar que hay un username almacenado en la sesión.
// Si lo hay podemos mostrar el contenido privado.
// En caso contrario usaremos la función header("Location: login.php"); para redirigir al usuario al login.
?>

