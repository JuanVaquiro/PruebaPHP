<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $colaboradorID = $_GET["colaborador_ID"];
    $caracteristica = $_POST["caracteristica"];
    $nota = $_POST["nota"];
    $comentario = $_POST["comentario"];

    // Aquí puedes realizar las validaciones y manipulaciones necesarias antes de guardar la nota en la base de datos

    // Guardar la nota en la base de datos
    // Realiza la conexión a la base de datos y ejecuta la consulta para guardar la nota

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
    $sql = "INSERT INTO notas (colaborador_ID, caracteristica, nota, comentario) VALUES ('$colaboradorID', '$caracteristica', '$nota', '$comentario')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "La nota se ha registrado correctamente.";
    } else {
        echo "Error al registrar la nota: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Nota</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Registrar Nota</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]."?colaborador_ID=".$_GET["colaborador_ID"]; ?>">
        <label for="caracteristica">Característica:</label>
        <input type="text" name="caracteristica" required><br>

        <label for="nota">Nota:</label>
        <input type="number" name="nota" step="0.01" required><br>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" rows="4" required></textarea><br>

        <input type="submit" value="Registrar Nota">
    </form>
</body>
</html>
