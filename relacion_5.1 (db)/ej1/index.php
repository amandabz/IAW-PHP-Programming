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

      //obtener la acción del botón que se ha pulsado en el formulario
      
      // Dar de baja un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
        $delete_with_dni = $_GET['dni']; 

        $query = "DELETE FROM cliente WHERE dni = '$delete_with_dni'";
        mysqli_query($conn, $query);
      }

      // Dar de alta un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
        $dni = $_GET['dni'];
        $nombre = $_GET['nombre'];
        $direccion = $_GET['direccion'];
        $telefono = $_GET['telefono']; 

        $query = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES (?, ?, ?, ?)";

        $insert_client = $conn->stmt_init();
        $insert_client->prepare($query);
        $insert_client->bind_param('issi', $dni, $nombre, $direccion, $telefono);
        // ejecucion
        $insert_client->execute();
        $insert_client->close();
      }

      // Modificar un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
        $update_with_dni = $_GET['dni'];
        $update_dni = $_GET['dni'];
        $update_name = $_GET['nombre'];
        $update_address = $_GET['direccion'];
        $update_number = $_GET['telefono'];

        $query = "UPDATE cliente SET nombre = '$update_name', direccion = '$update_address', telefono = '$update_number' WHERE dni = '$update_with_dni'";
        mysqli_query($conn, $query);
    }

      // Listado
      //Este listado se muestra siempre
      //hacer llamada a BD con la consulta del listado de clientes
      $consulta;
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
            <td><input type="text" name="dni"></td>
            <td><input type="text" name="nombre"></td>
            <td><input type="text" name="direccion"></td>
            <td><input type="text" name="telefono"></td>
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
  </div>



</body>

</html>