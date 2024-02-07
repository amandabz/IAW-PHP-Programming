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
      // conexión a la base de datos
      $host = "db";
      $dbUsername = "root";
      $dbPassword = "test";
      $dbName = "usuarios";

      $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
      // verificar la conexión
      if ($conn->connect_error) {
          die("Error de conexión: " . $conn->connect_error);
      }

      //obtener la acción del botón que se ha pulsado en el formulario
      
      // Dar de baja un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'borrar') {
      //hacer llamada a BD con la consulta oportuna
      }

      // Dar de alta un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'crear') {
      //hacer llamada a BD con la consulta oportuna
      }

      // Modificar un cliente
      if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
       //hacer llamada a BD con la consulta oportuna
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
        
        while ($registro = array()) { //hay que modificar el array() y cambiarlo por el código adecuado
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