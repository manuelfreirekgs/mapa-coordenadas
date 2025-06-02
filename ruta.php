<!DOCTYPE html>
<html>
<head>
  <title>Ruta en Mapa</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map { height: 500px; width: 100%; }
  </style>
</head>
<body>
  <h2>Ruta del equipo MOVIL 4 (GUIVELLY SPEED)</h2>
  <div id="map"></div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const map = L.map('map').setView([0.0, 0.0], 2); // vista inicial

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    fetch('datos002.php')
      .then(response => response.json())
      .then(data => {
        const puntos = [];
        data.forEach(p => {
          const latlng = [parseFloat(p.latitud), parseFloat(p.longitud)];
          puntos.push(latlng);

          // Opcional: Marcador en cada punto
          L.marker(latlng).addTo(map).bindPopup(p.equipo);
        });

        // Dibujar la ruta
        if (puntos.length > 1) {
          const ruta = L.polyline(puntos, { color: 'blue' }).addTo(map);
          map.fitBounds(ruta.getBounds()); // enfocar en toda la ruta
        } else if (puntos.length === 1) {
          map.setView(puntos[0], 15);
        }
      })
      .catch(error => {
        console.error("Error al cargar datos:", error);
      });
  </script>
</body>
</html>

