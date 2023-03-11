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

// Comprobar si el formulario ha sido enviado
if(isset($_POST["submit"])) {
  // Obtener los datos del formulario
  $colaboradorID = $_POST["colaboradorID"];
  $caracteristica = $_POST["caracteristica"];
  $nota = $_POST["nota"];
  $comentario = $_POST["comentario"];

  // Insertar los datos en la tabla de notas
  $sql = "INSERT INTO notas (colaborador_ID, caracteristica, nota, comentario) VALUES ('$colaboradorID', '$caracteristica', '$nota', '$comentario')";
  
  if ($conn->query($sql) === TRUE) {
    echo "Las notas se han guardado correctamente.";
  } else {
    echo "Error al guardar las notas: " . $conn->error;
  }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
