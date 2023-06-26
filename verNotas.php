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

// Obtener el ID del colaborador a través de la variable GET
if(isset($_GET["colaborador_id"])) {
  $colaborador_id = $_GET["colaborador_id"];
}

// Obtener los datos de las notas del colaborador_ID
$sql = "SELECT * FROM notas WHERE colaborador_ID = '$colaborador_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="estilos.css">
	<title>Tabla de Notas</title>
</head>
<body>
	<h2>Tabla de Notas</h2>
	<table>
		<tr>
			<th>#Num</th>
      <th>caracteristica</th>
			<th>Nota</th>
			<th>Comentario</th>
			<th>Fecha</th>
		</tr>
		<?php
		// Mostrar los datos de la tabla de notas en la tabla HTML
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["notaID"] . "</td>";
      echo "<td>" . $row["caracteristica"] . "</td>";
			echo "<td>" . $row["nota"] . "</td>";
			echo "<td>" . $row["comentario"] . "</td>";
			echo "<td>" . $row["fecha_registro"] . "</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>

<?php
//Cerrar la conexión con la base de datos
  $conn->close();
?> 
