<?php
session_start();
// Función para validar el nombre
function validarNombre($nombre) {
  return preg_match('/^[a-zA-Záéíóúñ]+$/', $nombre);
}

// Función para validar el número de teléfono
function validarTelefono($telefono) {
  return preg_match('/^[67]\d{8}$/', $telefono);
}

// Función para validar la dirección de correo electrónico
function validarEmail($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Inicialización de variables
$nombre = "";
$telefono = "";
$email = "";
$errores = [];

// Se procesan los datos si se ha enviado el formulario
if (isset($_POST['submit'])) {
  // Se obtienen los datos del formulario
  $nombre = $_POST['nombre'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];

  // Se validan los datos
  if (!validarNombre($nombre)) {
    $errores[] = "El nombre solo puede contener letras.";
  }
  if (!validarTelefono($telefono)) {
    $errores[] = "El número de teléfono debe tener 9 números y comenzar por 6 o 7.";
  }
  if (!validarEmail($email)) {
    $errores[] = "La dirección de correo electrónico no es válida.";
  }

  // Si no hay errores, se muestran los datos
  if (!$errores) {
    $_SESSION['nombre']=$nombre;
    $_SESSION['telefono']=$telefono;
    $_SESSION['email']=$email;
    echo "<h2>Datos válidos</h2>";
    echo "<ul>";
    echo "<li>Nombre:".$_SESSION['nombre']."</li>";
    echo "<li>Teléfono:".$_SESSION['telefono']."</li>";
    echo "<li>Correo electrónico:".$_SESSION['email']."</li>";
    echo "</ul>";
  } else {
    // Se muestran los errores
    echo "<h2>Se han encontrado errores</h2>";
    echo "<ul>";
    foreach ($errores as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de datos en PHP</title>
</head>
<body>
  <h1>Formulario de validación</h1>
  <form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
    <br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>">
    <br>
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>">
    <br>
    <br>
    <input type="submit" name="submit" value="Enviar">
  </form>
</body>
</html>
