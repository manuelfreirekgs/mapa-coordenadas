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


 ///////////////////////////
$sql = "SELECT * FROM ubicaciones ORDER BY id DESC LIMIT 10";
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($datos); // ← esto devuelve un arreglo
//////////////////////////////////////


} catch (PDOException $e) {
    // En caso de error, devolver mensaje
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión: " . $e->getMessage()]);
}
?>
