<?php
include "layout/header/header.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotas de Ciclismo</title>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.17.0/maps/maps-web.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
<style>
    /* Reset básico para garantir consistência entre navegadores */


/* Estilo do painel de rotas */
#routePanel {
    background: rgba(255, 255, 255, 0.9); /* Fundo transparente */
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 600px;
    margin: 0 auto; /* Centraliza o painel */
    z-index: 10; /* Garantir que o painel fique sobre o mapa */
}

/* Ajuste para que o painel não sobreponha totalmente o mapa */
#routePanel h2 {
    font-size: 1.8em;
    margin-bottom: 15px;
    color: #2e7d32; /* Verde escuro */
}

/* Estilo do mapa */
#map {
    width: 100%;
    height: 500px; /* Altura ajustada para melhor visualização */
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin-top: 20px; /* Espaço superior para o painel de pesquisa não cobrir o mapa */
}

/* Estilo do formulário */
form {
    margin: 20px 0;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-size: 1.1em;
    color: #333;
}

input[type="text"],
select {
    width: 100%;
    padding: 15px;
    margin-bottom: 15px;
    border: 2px solid #2e7d32; /* Verde escuro */
    border-radius: 8px;
    font-size: 1.1em;
    transition: all 0.3s ease-in-out;
}

input[type="text"]:focus,
select:focus {
    border-color: #66bb6a; /* Verde claro */
    box-shadow: 0 0 8px rgba(102, 187, 106, 0.5);
}

button {
    background-color: #66bb6a; /* Verde claro */
    color: white;
    padding: 15px;
    border: none;
    border-radius: 8px;
    font-size: 1.2em;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s, transform 0.3s;
    width: 100%;
}

button:hover {
    background-color: #4caf50; /* Verde médio */
    transform: translateY(-2px); /* Efeito de leve elevação */
}

/* Estilo da informação da rota */
#routeInfo {
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    margin-top: 20px;
    color: #333;
}

/* Estilo dos ícones e informações da rota */
.route-info {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.route-info i {
    font-size: 1.5em;
    color: #4caf50; /* Verde médio */
    margin-right: 10px;
}

footer {
    background-color: #ffffff;
    box-shadow: 0 -2px 5px rgba(0,0,0,0.2);
    padding: 10px 20px;
    text-align: center;
    margin-top: 30px;
}

footer p {
    font-size: 0.9em;
    color: #666;
}

</style>

</head>
<?php
include "footer.php"
?>
<body>
    <section class="home-hero">
        <div class="home-hero__content">
          <h1 class="heading-primary">Encontre a Rota Perfeita para Você!</h1>
          <div class="home-hero__info">
            <p class="text-primary">
              Quer passear por um lugar diferente e não 
                conhece muita coisa por aí? A <a href="index.php" class="linkRota-inicio">Zaily</a> pode te ajudar!
                Separamos algumas das melhores estradas e caminhos que 
                vale a pena percorrer com a sua bicicleta.
                Seja você um nativo ou viajante,
                a única regra e ser apaixonado pelo <a href="#" class="linkRota-cicle">ciclismo.</a>  
            </p>
          </div>
           <div class="home-hero__cta">
            <a href="./rotas.php#formulario" class="btn btn--bg">Vamos descobrir?</a>
          </div>
        </div>
        <!--
        <div class="home-hero__mouse-scroll-cont">
          <div class="mouse"></div>
        </div> -->
      </section>
      <br>
      <br>
    <section>
        <div id="routePanel">
            <h2>Planeje sua rota</h2>
            <label for="start">Ponto de Partida:</label>
            <input type="text" id="start" placeholder="Ex: Joinville">
            <label for="end">Destino:</label>
            <input type="text" id="end" placeholder="Ex: Florianópolis">
            <button onclick="planRoute()">Traçar Rota</button>
            <div id="routeInfo"></div>
        </div>
        <div id="map"></div>
    </section>

    <script>
        // Inicializar o mapa
        let map = tt.map({
            key: 't4XXN5DSEAGeKNUGjvQQXVmb6e8UKuPo',
            container: 'map',
            center: [-48.845, -26.304], // Coordenadas de exemplo (Joinville)
            zoom: 10
        });

        let routeSource = null;  // Variável global para armazenar a fonte de rota

        // Função para planejar a rota
        function planRoute() {
            const start = document.getElementById("start").value;
            const end = document.getElementById("end").value;

            if (start && end) {
                const geocodeUrl = (location) => `https://api.tomtom.com/search/2/geocode/${encodeURIComponent(location)}.json?key=t4XXN5DSEAGeKNUGjvQQXVmb6e8UKuPo`;

                const getCoordinates = async (location) => {
                    const response = await fetch(geocodeUrl(location));
                    const data = await response.json();
                    return data.results[0].position;
                };

                Promise.all([getCoordinates(start), getCoordinates(end)])
                    .then(([startPos, endPos]) => {
                        const routeUrl = `https://api.tomtom.com/routing/1/calculateRoute/${startPos.lat},${startPos.lon}:${endPos.lat},${endPos.lon}/json?key=t4XXN5DSEAGeKNUGjvQQXVmb6e8UKuPo&travelMode=bicycle`;

                        return fetch(routeUrl);
                    })
                    .then(response => response.json())
                    .then(data => {
                        const route = data.routes[0].legs[0].points;
                        const distanceMeters = data.routes[0].summary.lengthInMeters;
                        const travelTimeSeconds = data.routes[0].summary.travelTimeInSeconds;

                        const distanceKm = (distanceMeters / 1000).toFixed(2);
                        const travelTimeMinutes = (travelTimeSeconds / 60).toFixed(2);

                        function formatTravelTime(minutes) {
                            if (minutes >= 60) {
                                const hours = Math.floor(minutes / 60);
                                const remainingMinutes = Math.floor(minutes % 60);
                                return `${hours}h ${remainingMinutes}min`;
                            } else {
                                return `${Math.floor(minutes)} min`;
                            }
                        }

                        document.getElementById("routeInfo").innerHTML = `
                            <div class="route-info">
                                <i class="fas fa-road"></i> <p>Distância total: ${distanceKm} km</p>
                            </div>
                            <div class="route-info">
                                <i class="fas fa-bicycle"></i> <p>Tempo estimado de bicicleta: ${formatTravelTime(travelTimeMinutes)}</p>
                            </div>
                        `;

                        if (routeSource) {
                            map.removeLayer('routeLayer');
                            map.removeSource('routeSource');
                        }

                        routeSource = {
                            type: 'geojson',
                            data: {
                                type: 'FeatureCollection',
                                features: [{
                                    type: 'Feature',
                                    geometry: {
                                        type: 'LineString',
                                        coordinates: route.map(point => [point.longitude, point.latitude])
                                    }
                                }]
                            }
                        };

                        map.addSource('routeSource', routeSource);
                        map.addLayer({
                            id: 'routeLayer',
                            type: 'line',
                            source: 'routeSource',
                            paint: {
                                'line-color': '#28a745',
                                'line-width': 5
                            }
                        });

                        const bounds = new tt.LngLatBounds();
                        route.forEach(point => bounds.extend([point.longitude, point.latitude]));
                        map.fitBounds(bounds, { padding: 20 });
                    })
                    .catch(error => {
                        console.error('Erro ao traçar a rota:', error);
                    });
            } else {
                alert("Por favor, preencha os campos de partida e destino.");
            }
        }
    </script>
</body>
</html>

<br><br><br><br><br>

<?php 

    include "layout/footer/footer.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $start = $_POST['start'];
        $end = $_POST['end'];
        
        // Aqui você pode conectar com banco de dados ou processar os dados
        echo "Rota de $start para $end foi traçada com sucesso!";
    }
    
?>
