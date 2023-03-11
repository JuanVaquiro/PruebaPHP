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
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Consultar la tabla de usuarios
  $sql = "SELECT * FROM usuario WHERE email = '$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  // Verificar si el usuario existe y la contraseña es correcta
  if($row && $password === $row["password"]) {
    // Iniciar sesión y redirigir al archivo de notas
    session_start();
    $_SESSION["empresario"] = $row["nombre"];
    header("Location: tablaColaboradores.php");
    exit();
  } else {
    // Mostrar un mensaje de error si los datos son incorrectos
    $error_message = "El correo electrónico o la contraseña son incorrectos.";
  }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="estilos.css">
  <title>Iniciar sesión</title>
</head>
<body>
  <h2>Iniciar sesión</h2>
  <?php if(isset($error_message)) { echo "<p style='color:red'>" . $error_message . "</p>"; } ?>
  <form method="post">
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <br>
    <input type="submit" name="submit" value="Iniciar sesión">
  </form>
</body>
</html>
