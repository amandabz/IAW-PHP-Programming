<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestclient</title>
  
</head>
<body>
  <div style="background-color: lightblue;">
    <div >
      <h1 >GESTCLIENT</h1>
      <h2>Gestión de clientes de CertiBank</h2>
      <?php
      // Conexión a la base de datos
      $host = "db";
      $dbUsername = "root";
      $dbPassword = "test";
      $dbName = "Banco";

      $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

      // funciones
      function clienteExiste($conn, $dni) {
          $query = "SELECT * FROM cliente WHERE dni=?";
          $stmt = $conn->prepare($query);
          $stmt->bind_param("s", $dni);
          $stmt->execute();
          $numRows = $stmt->get_result()->num_rows;
          $stmt->close();

          return $numRows > 0;
      }

      function eliminarCliente($conn, $dni) {
          if (clienteExiste($conn, $dni)) {
              $query = "DELETE FROM cliente WHERE dni = ?";
              $stmt = $conn->prepare($query);
              $stmt->bind_param("s", $dni);
              $stmt->execute();

              if ($stmt->affected_rows > 0) {
                  return true;
              }
              $stmt->close();
          }
          return false;
      }

      function crearCliente($conn, $dni, $nombre, $direccion, $telefono) {
          if (isset($dni) && isset($nombre) && isset($direccion) && isset($telefono)) {
              if (clienteExiste($conn, $dni)) {
                  echo "<p>Ya existe un usuario con el DNI " . $dni . ". Prueba con otro.</p>";
              } else {
                  $query = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES (?, ?, ?, ?)";
                  $stmt = $conn->prepare($query);
                  $stmt->bind_param("ssss", $dni, $nombre, $direccion, $telefono);
                  $stmt->execute();

                  if ($stmt->affected_rows > 0) {
                      echo "El usuario con DNI ". $dni . " se ha insertado correctamente";
                  }
                  $stmt->close();
              }
            }
        }

      function modificarCliente($conn, $old_dni, $new_dni, $nombre, $direccion, $telefono) {
      if (isset($new_dni) && isset($nombre) && isset($direccion) && isset($telefono)) {
          if (clienteExiste($conn, $old_dni)) {
              $update_query = "UPDATE cliente SET dni = ?, nombre = ?, direccion = ?, telefono = ? WHERE dni = ?";
              $stmt = $conn->prepare($update_query);
              $stmt->bind_param("sssss", $new_dni, $nombre, $direccion, $telefono, $old_dni);
              $stmt->execute();

              if ($stmt->affected_rows > 0) {
                  return true;
              }
              $stmt->close();
          }
          return false;
        }
      }

      // Dar de baja un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
          $dni = $_GET['dni'];
          if (eliminarCliente($conn, $dni)) {
              echo "<p>Cliente con DNI $dni eliminado correctamente.</p>";
          } else {
              echo "<p>Error.</p>";
          }
      }

      // Dar de alta un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
          $dni = $_GET['dni'];
          $nombre = $_GET['nombre'];
          $direccion = $_GET['direccion'];
          $telefono = $_GET['telefono'];

          crearCliente($conn, $dni, $nombre, $direccion, $telefono);
      }

      // Modificar un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
          $old_dni = $_GET['dniAntiguo'];
          $new_dni = $_GET['dni'];
          $update_name = $_GET['nombre'];
          $update_address = $_GET['direccion'];
          $update_number = $_GET['telefono'];

          modificarCliente($conn, $old_dni, $new_dni, $update_name, $update_address, $update_number);
      }

      // Listado
      //Este listado se muestra siempre
      //hacer llamada a BD con la consulta del listado de clientes
      // $consulta;
      ?>

      <table >
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th></th>
        </tr>

        <form action="index.php" method="GET">
          <tr>
            <td><label>
                    <input type="text" name="dni">
                </label></td>
            <td><label>
                    <input type="text" name="nombre">
                </label></td>
            <td><label>
                    <input type="text" name="direccion">
                </label></td>
            <td><label>
                    <input type="text" name="telefono">
                </label></td>
            <input type="hidden" name="accion" value="crear">
            <td><input type="submit" value="Añadir"></td>
          </tr>
        </form>

        <?php
        //mostrar los clientes de la bd en la tabla
        $query = 'SELECT * from cliente';
        $statement = $conn->stmt_init();
        $statement->prepare($query);
        $statement->execute();

        $result = $statement->get_result();

        while ($registro = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$registro['dni']." </td>
            <td>". $registro['nombre']." </td>
            <td>". $registro['direccion']." </td>
            <td>". $registro['telefono']." </td>
            <td>
              <a href=\"modificar.php?&dni=". $registro['dni'] ."&nombre=". $registro['nombre'] ."&direccion=". $registro['direccion'] . "&telefono=". $registro['telefono']." \">
                <button >Modificar</button>
              </a>
            </td>
            <td>
              <a href=\"index.php?accion=borrar&dni=". $registro['dni']."\">
                <button>
                  <img width='20px' src='papelera.png' >
                </button>
              </a>
            </td>
          </tr>";
        
        }
        ?>
      </table>
    </div>
      <br>
      <a href="login.php"><button>Salir</button></a>
  </div>
</body>
</html>