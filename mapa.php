<!DOCTYPE html>
<html>
<head>
    <title>Mapa desde BD</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; width: 100%; }
    </style>
</head>
<body>
    <h2>Ubicaciones en el mapa</h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    const map = L.map('map').setView([-34.6037, -58.3816], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    fetch('datos.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(punto => {
                L.marker([punto.latitud, punto.longitud])
                    .addTo(map)
                    .bindPopup(punto.nombre);
            });
        });
    </script>
</body>
</html>