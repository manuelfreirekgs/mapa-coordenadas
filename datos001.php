<?php
$host = 'dpg-d0r7293uibrs73cvc6kg-a.frankfurt-postgres.render.com';
//$host = 'dpg-d0r7293uibrs73cvc6kg-a';
$db = 'guivelly';
$user = 'user';
$pass = 'YuVYGYvGTu8oTJvLP6owctiFmq6pGZnx';
$port = '5432';


$conn = pg_connect("host=$host dbname=$db user=$user password=$pass port=$port");

if (!$conn) {
  echo json_encode(['error' => 'No se pudo conectar a la base de datos']);

  exit;
}

$query = "SELECT id, equipo, latitud, longitud, velocidad, fecha, hora FROM ubicaciones ORDER BY id DESC LIMIT 1";
$result = pg_query($conn, $query);

if (!$result) {
  echo json_encode(['error' => 'Consulta fallida']);
  exit;
}

$data = pg_fetch_assoc($result);
echo json_encode($data);
?>
