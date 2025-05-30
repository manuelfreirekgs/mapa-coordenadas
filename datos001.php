<?php
// Configuración de la base de datos
$host = 'dpg-d0r7293uibrs73cvc6kg-a';
$db   = 'guivelly';
$user = 'user';
$pass = 'YuVYGYvGTu8oTJvLP6owctiFmq6pGZnx';
$port = '5432';

try {
    // Crear conexión PDO
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener el último registro
    $sql = "SELECT * FROM ubicaciones ORDER BY id DESC LIMIT 1";
    $stmt = $conn->query($sql);
    $dato = $stmt->fetch(PDO::FETCH_ASSOC); // ← solo una fila

    // Devolver como JSON
    echo json_encode($dato);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
}
?>
