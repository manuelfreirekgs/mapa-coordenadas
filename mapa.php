<!DOCTYPE html>
<html>
<head>
    <title>GUIVELLY SPEED</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
    <h2>Ubicaciones en el mapa4</h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>GUIVELLY SPEED</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
    <h2>Ubicaciones en el mapa4</h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>GUIVELLY SPEED</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
    <h2>Ubicaciones en el mapa4</h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!DOCTYPE html>
<html>
<head>
    <title>GUIVELLY SPEED</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
    <h2>Ubicaciones en el mapa4</h2>
    <div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    console.log("Cargando mapa...");

    // Creamos el mapa, sin centrarlo aún
    const map = L.map('map');

    // Cargamos los tiles de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Obtenemos el último punto desde PHP
    fetch('datos001.php')
        .then(response => response.json())
        .then(data => {
            const lat = parseFloat(data.latitud);
            const lon = parseFloat(data.longitud);

            // Centramos el mapa en el punto y hacemos zoom
            map.setView([lat, lon], 17);

            // Mostramos un marcador
            L.marker([lat, lon]).addTo(map)
                .bindPopup(`Equipo: ${data.equipo}<br>Fecha: ${data.fecha}<br>Hora: ${data.hora}`)
                .openPopup();
        })
        .catch(error => {
            console.error("Error al obtener datos:", error);
        });
</script>
</body>
</html>



    
</body>
</html>

    
</body>
</html>

    
</body>
</html>
