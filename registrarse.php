<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["password"];

    // Aquí puedes realizar las validaciones y manipulaciones necesarias antes de guardar el usuario en la base de datos

    // Guardar el usuario en la base de datos
    // Realiza la conexión a la base de datos y ejecuta la consulta para guardar el usuario

    // Ejemplo de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prouebatecnica";

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL
    $sql = "INSERT INTO usuario (nombre, email, password) VALUES ('$nombre', '$email', '$contrasena')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "El usuario se ha creado correctamente.";
    } else {
        echo "Error al crear el usuario: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
    <title>Crear Usuario</title>
</head>
<body>
    <h2>Crear Usuario</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Crear Usuario">
    </form>
</body>
</html>
