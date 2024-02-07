<?

if (
    isset($_POST['usuario']) && isset($_POST['password'])
    && isset($_POST['password2'])
) {
    $user = strtolower($_POST['usuario']);
    $password = hash('sha512', $_POST['password']);
    $password2 = hash('sha512', $_POST['password2']);

    if ($password == $password2) { //si las pass coinciden
        //comprobamos que el usuario no existe ya en BD
        try {
            $host = "db";
            $dbUsername = "root";
            $dbPassword = "test";
            $dbName = "usuarios";
            //Crear una conexión a la base de datos
            $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
            //Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            //Iniciar el statement
            $statement = $conn->stmt_init();
            //Preparar el statement
            $statement->prepare('SELECT * FROM usuarios WHERE usuario = ? LIMIT 1');
            //Añadir los parámetros
            $statement->bind_param('s', $user);
            //Ejecutar el statement
            $statement->execute();
            //Obtener los resultados
            $resultado = $statement->get_result();

            //Comprobar si la consulta devuelve filas
            if ($resultado->num_rows > 0) {
                // $errores .= "el usuario ya existe";
            } else {
                //guardo en BD el usuario
                $insertStatement = $conn->prepare('INSERT INTO usuarios(usuario, password) values (?, ?)');
                $insertStatement->bind_param('ss', $user, $password);
                $insertStatement->execute();
                //Cerrar statement
                $insertStatement->close();
            }
            //Cerrar statement y conexion
            $statement->close();
            $conn->close();
        } catch (Exception $e) {

        }
        header("Location: login.php");
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
    <form action="<? echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password2" placeholder="Repite Password">
        <input type="submit" value="Aceptar">
    </form>

    <p>¿Tienes cuenta?</p>
    <a href="login.php">Inicia sesión</a>
</body>

</html>