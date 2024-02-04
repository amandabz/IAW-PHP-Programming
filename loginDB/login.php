<?php
session_start();
//aquí se comprueba si el usuario ha insertado un username y password
//utiliza la función hash('sha512',$password) para cifrar la contraseña
//si el username es test y la password cifrada coincide con el hash('sha512',"test")
//se trata de un usuario válido y debemos proceder a guardar el username en la sesión 
//y posteriormente usar la función header("Location: contenido.php"); para acceder
//a la parte privada de la aplicación
//Si el username y contraseña no coincide con test/test usaremos la función header
//header("Location: index.php"); para ir a la parte pública de la aplicación

if(isset($_POST["usuario"]) && isset($_POST["password"])){
    $username = strtolower($_POST["usuario"]);
    $password = $_POST["password"];

    $password = hash('sha512', $password);

    try {
        //database connection parameters
        $host="db";
        $dbUsername="root";
        $dbPassword="test";
        $dbName="Usuarios";

        // connection
        $conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
        if ($conn->connect_error) {
            die;
        }

        // init statement
        $statement=$conn->stmt_init();

        // prepare statement
        $statement->prepare('Select * From usuarios Where usuario = ":NombreUsuario" and password = ":password"');
        $statement->bind_param(':NombreUsuario, :password',$username,$password );

        // execute statement
        $statement->execute();

        // get result
        $resultado=$statement->get_result();

        // see if the user exists
        if ($resultado->num_rows > 0) {
            header("Location=contenido.php");
        } else{
            header("Location=login.php");
        }

        // close statement and connection
        $statement->close();
        $conn->close();

    } catch (Throwable $th) {
        //throw $th;
    }

    if ($username == 'test' && $password == $password_test) {
        $_SESSION["username"] = $username;
        header("Location: contenido.php");
    } else {
        header("Location: index.php");
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
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" name="login">
    <label>
        <input type="text" name="usuario" placeholder="Usuario">
    </label>
    <label>
        <input type="password" name="password" placeholder="Password">
    </label>
    <input type="submit" value="Aceptar">
</form>

<p>¿No tienes cuenta?</p>
<a href="registro.php">Registrate</a>
</body>
</html>
