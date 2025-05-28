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
    <h2>Ubicaciones en el mapa0</h2>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>

    console.log("hola1");
        
    const map = L.map('map').setView([0.073080, -76.932743], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

  console.log("hola2");
        
   fetch('datos001.php')

//         console.log("hola3");
       
        .then(response => response.json())
        .then(data => {
            data.forEach(punto => {
        console.log("Latitud:", punto.latitud, "Longitud:", punto.longitud);
                L.marker([punto.latitud, punto.longitud])
                    .addTo(map)
                    .bindPopup(punto.equipo);
            });
        });
    </script>
</body>
</html>
