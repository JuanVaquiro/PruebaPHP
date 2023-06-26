<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prouebatecnica";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Comprobar si el empresario ha iniciado sesión
session_start();

if(!isset($_SESSION["empresario"])) {
  header("Location: index.php");
  exit();
}

//Obtener la lista de colaboradores desde la base de datos
$sql = "SELECT * FROM colaboradores";
$result = $conn->query($sql);
?>

<!--Tabla de los colaboradores-->
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="estilos.css">
	<title>Tabla de Colaboradores</title>
</head>
<body>
  
  <div class="betewen">
    <h2>Tabla de Colaboradores</h2>
    <div>
      <a href="SST.php" class="btn_praimary">MODULO DE SST</a>
      <a href="cultura_fisica.php" class="btn_praimary">MODULO DE CULTURA FISICA</a>    
    </div>
  </div>

<table>
  <tr>
    <th>Colaborador</th>
    <th>Email</th>
    <th>Cargo</th>
    <th>Ver Notas</th>
    <th>Ingresar Notas</th>
  </tr>
  <?php
  //Obtener las notas de los colaboradores desde la base de datos  
  while($row = $result->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $row['nombre']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['cargo']; ?></td>
          <td><a href="verNotas.php?colaborador_id=<?php echo $row['colaboradorID']?>">Notas</a></td>
          <td><a href="ingresarNotas.php?colaborador_ID=<?php echo $row['colaboradorID']?>">Ingresar Notas</a></td>
        </tr>
        <?php 
      } 
    ?>
  </table>
  </body>
</html>
  <?php
  //Cerrar la conexión con la base de datos
  $conn->close();
  ?> 