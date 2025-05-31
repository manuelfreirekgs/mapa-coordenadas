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

    console.log("hola1");
        
    const map = L.map('map').setView([0.073080, -76.932743], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);



          
   fetch('datos001.php')

       
        .then(response => response.json())
        .then(data => {  data.forEach(punto => {
  L.marker([punto.latitud, punto.longitud]).addTo(mapa)
    .bindPopup(punto.equipo);
});
      
            });
    </script>
</body>
</html>
