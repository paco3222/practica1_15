<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_usuarios";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$correo = $_POST['correo'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (nombre_completo, fecha_nacimiento, correo, contraseña)
        VALUES ('$nombre', '$fecha_nacimiento', '$correo', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. <a href='mostrar.php'>Ver registros</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
