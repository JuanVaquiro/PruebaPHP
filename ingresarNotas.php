<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proueba_tecnica";

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

// Obtener los datos del colaborador
$sql = "SELECT * FROM colaboradores WHERE colaboradorID = '$colaborador_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Comprobar si el colaborador existe
if(!$row) {
  echo "El colaborador no existe.";
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="estilos.css">
	<title>Tabla de Notas</title>
</head>
<body>
<?php
// Mostrar el formulario de notas
echo "<h2>Ingresar Notas del colaborador: " . $row["nombre"] . "</h2>";
echo "<form action='guardar_notas.php' method='post'>";
echo "<input type='hidden' name='colaborador_id' value='" . $colaborador_id . "'>";
echo "<table>";
echo "<tr><th>Característica</th><th>Nota</th><th>Comentario</th></tr>";
echo "<tr>
  <td><input type='text' name='caracteristica1' name='caracteristica1'></td>
  <td><input type='number' step='0.1' name='nota1'></td>
  <td><input type='text' name='comentario1'></td>
  </tr>";
echo "<tr>
  <td><input type='text' name='caracteristica1' name='caracteristica1'></td>
  <td><input type='number' step='0.1' name='nota2'></td>
  <td><input type='text' name='comentario2'></td>
  </tr>";
echo "<tr>
  <td><input type='text' name='caracteristica1' name='caracteristica1'></td>
  <td><input type='number' step='0.1' name='nota3'></td>
  <td><input type='text' name='comentario3'></td>
  </tr>";
echo "</table>";
echo "<input type='submit' value='Guardar'>";
echo "</form>";

// Cerrar la conexión a la base de datos
$conn->close();
?>
</body>
</html>