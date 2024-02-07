<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo "<h1>Hola, " . $_SESSION['usuario'] . "</h1>";
    echo "Esta es la página de contenido que se abre cuando el usuario inicia sesión correctamente <br>";
?>
<a href="cerrarsesion.php">Cerrar sesion </a>

<?php
} else {
   header("Location: login.php");
}

?>