<?php
// Configuración de la base de datos
$host = 'dpg-d0r7293uibrs73cvc6kg-a';
$db   = 'guivelly';
$user = 'user';
$pass = 'YuVYGYvGTu8oTJvLP6owctiFmq6pGZnx';
$port = '5432';

header('Content-Type: application/json');

try {
    // Conexión con PDO
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta: los últimos 100 puntos ordenados por ID (o por fecha+hora)
    $sql = "SELECT latitud, longitud, equipo FROM ubicaciones ORDER BY id ASC LIMIT 100";
    $stmt = $conn->query($sql);
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($datos);

} catch (PDOException $e) {
    // Si hay error, se informa
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
}
?>
