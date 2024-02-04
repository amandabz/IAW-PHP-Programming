<?php
if (isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])) {
    $username=$_POST["username"];
    $password1=hash('sha512',$_POST['password1']);
    $password2=hash('sha512',$_POST['password2']);

    if ($password1 == $password2) {
        try {
            //database connection parameters
            $host="db";
            $dbUsername="root";
            $dbPassword="test";
            $dbName="Usuarios";

            // connection
            $conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
            if ($conn->connect_error) {
                die ;
            }

            // init statement
            $statement=$conn->stmt_init();

            // prepare statement
            $statement->prepare('Select * From usuarios Where usuario = ?');
            $statement->bind_param('s',$username);

            // get result
            $resultado=$statement->get_result();

            // check if the user exists
            if ($resultado->num_rows > 0) {
                echo "error";
            } else {
                // if it does not exist, I save it in the database
                $insertstatement=$conn->stmt_init();
                echo "Insert Into usuarios(usuario,password) values ($username,$password1)";
                $insertstatement->prepare("Insert Into usuarios(usuario,password) values (?,?)");
                $insertstatement->bind_param('ss', $username, $password1);

                // execute statement
                $insertstatement->execute();

                // close statement
                $insertstatement->close();
            }

            // close statement and connection
            $statement->close();
            $conn->close();

        } catch (Throwable $th) {
            //throw $th;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

</head>
<body>

<p>En construccion...</p>

<form action="registro.php" method="post">
    <label>
        <input type="text" name="username" placeholder="Usuario">
    </label><br>
    <label>
        <input type="text" name="password1" placeholder="Contraseña">
    </label><br>
    <label>
        <input type="text" name="password2" placeholder="Repite la contraseña">
    </label><br>
    <input type="submit" value="send">
</form>
<a href="login.php">Inicia sesión</a>
</body>
</html>