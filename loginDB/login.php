<?php
session_start();
//si ya existe un usuario en la sesión vamos al contenido del usuario
if (isset($_SESSION['usuario'])) {
    header('Location: contenido.php');
} else {

    if (isset($_POST['usuario']) && isset($_POST['password'])) {

        $user = strtolower($_POST['usuario']);
        $password = hash('sha512', $_POST['password']);

        $host = "db";
        $dbUsername = "root";
        $dbPassword = "test";
        $db = "Usuarios";
        $conn =  mysqli_connect($host, $dbUsername, $dbPassword, $db);
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $statement = $conn->stmt_init();
        $statement = $conn->prepare('SELECT * FROM usuarios WHERE usuario = ? AND password = ? LIMIT 1');
        $statement->bind_param('ss', $user, $password);
        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows == 1) {
            $_SESSION['usuario'] = $user;
            header("Location: contenido.php");
        } else {
            header("Location: registro.php");
            //echo "usuario no existe";
        }
        $statement->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

</head>
<body>
    <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">

    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Aceptar">
    </form>

    <p>¿No tienes cuenta?</p>
    <a href="registro.php">Registrate</a>
</body>
</html>
