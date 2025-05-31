<?php
// Configuración de la base de datos
$host = 'dpg-d0r7293uibrs73cvc6kg-a';
$db   = 'guivelly';
$user = 'user';
$pass = 'YuVYGYvGTu8oTJvLP6owctiFmq6pGZnx';
$port = '5432';

try {
    // Conexión PDO
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Leer los datos POST
    $equipo    = $_POST['equipo'] ?? '';
    $latitud   = $_POST['latitud'] ?? '';
    $longitud  = $_POST['longitud'] ?? '';
    $velocidad = $_POST['velocidad'] ?? '';

    // Tomar la fecha y hora del servidor
    date_default_timezone_set('America/Bogota'); // Ajusta tu zona horaria si es necesario
    $fecha = date('Y-m-d');
    $hora  = date('H:i:s');

    // Validar datos mínimos
    if ($equipo && $latitud && $longitud) {
        $sql = "INSERT INTO ubicaciones (equipo, latitud, longitud, velocidad, fecha, hora)
                VALUES (:equipo, :latitud, :longitud, :velocidad, :fecha, :hora)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':equipo'    => $equipo,
            ':latitud'   => $latitud,
            ':longitud'  => $longitud,
            ':velocidad' => $velocidad,
            ':fecha'     => $fecha,
            ':hora'      => $hora
        ]);

        echo json_encode(["estado" => "ok", "mensaje" => "Registro insertado"]);
    } else {
        http_response_code(400);
        echo json_encode(["estado" => "error", "mensaje" => "Datos incompletos"]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["estado" => "error", "mensaje" => "Error DB: " . $e->getMessage()]);
}
?>
