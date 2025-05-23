<?php
$host = 'localhost';
$user = 'tu_usuario';
$pass = 'tu_contraseña';
$db = 'tu_base_de_datos';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT nombre, latitud, longitud FROM ubicaciones";
$result = $conn->query($sql);

$datos = [];
while ($row = $result->fetch_assoc()) {
    $datos[] = $row;
}

header('Content-Type: application/json');
echo json_encode($datos);

$conn->close();
?>