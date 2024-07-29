<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .endpoint {
            margin-bottom: 20px;
        }
        .endpoint h2 {
            margin-bottom: 5px;
        }
        .endpoint pre {
            background-color: #f4f4f4;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .response {
            background-color: #e4e4e4;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 10px;
			white-space: pre-wrap; /* Ensure line breaks are respected */
            font-family: monospace; /* Use a monospace font for better readability */
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>API Documentation</h1>
        
        <div class="endpoint">
            <h2>Get All Temporadas</h2>
            <pre>GET /api/temporadas</pre>
            <button class="btn" onclick="fetchData('./api/temporadas', 'response-temporadas')">Try it out</button>
            <div class="response" id="response-temporadas"></div>
        </div>

        <div class="endpoint">
            <h2>Get Temporada by ID</h2>
            <pre>GET /api/temporadas/{idtemporada}</pre>
            <input type="text" id="input-temporada-id" placeholder="Enter idtemporada">
            <button class="btn" onclick="fetchData('./api/temporadas/' + document.getElementById('input-temporada-id').value, 'response-temporada')">Try it out</button>
            <div class="response" id="response-temporada"></div>
        </div>

        <div class="endpoint">
            <h2>Get All Entrenadores</h2>
            <pre>GET /api/entrenadores</pre>
            <button class="btn" onclick="fetchData('./api/entrenadores', 'response-entrenadores')">Try it out</button>
            <div class="response" id="response-entrenadores"></div>
        </div>

        <div class="endpoint">
            <h2>Get Entrenador by ID</h2>
            <pre>GET /api/entrenadores/{identrenador}</pre>
            <input type="text" id="input-entrenador-id" placeholder="Enter identrenador">
            <button class="btn" onclick="fetchData('./api/entrenadores/' + document.getElementById('input-entrenador-id').value, 'response-entrenador')">Try it out</button>
            <div class="response" id="response-entrenador"></div>
        </div>

        <div class="endpoint">
            <h2>Get All Jugadores</h2>
            <pre>GET /api/jugadores</pre>
            <button class="btn" onclick="fetchData('./api/jugadores', 'response-jugadores')">Try it out</button>
            <div class="response" id="response-jugadores"></div>
        </div>

        <div class="endpoint">
            <h2>Get Jugador by ID</h2>
            <pre>GET /api/jugadores/{idjugador}</pre>
            <input type="text" id="input-jugador-id" placeholder="Enter idjugador">
            <button class="btn" onclick="fetchData('./api/jugadores/' + document.getElementById('input-jugador-id').value, 'response-jugador')">Try it out</button>
            <div class="response" id="response-jugador"></div>
        </div>
		
		<div class="endpoint">
            <h2>Get Temporada Jugador by ID </h2>
            <pre>GET /api/jugadores/{idjugador}/temporadas/{idtemporada}</pre>
            <input type="text" id="input-jugador-id-temporada" placeholder="Enter idjugador">
			<input type="text" id="input-jugador-id-temporada2" placeholder="Enter idtemporada">
            <button class="btn" onclick="fetchData('./api/jugadores/' + document.getElementById('input-jugador-id-temporada').value + '/temporadas/' + document.getElementById('input-jugador-id-temporada2').value, 'response-jugador-temporada')">Try it out</button>
            <div class="response" id="response-jugador-temporada"></div>
        </div>

        <div class="endpoint">
            <h2>Get All Partidos</h2>
            <pre>GET /api/partidos</pre>
            <button class="btn" onclick="fetchData('./api/partidos', 'response-partidos')">Try it out</button>
            <div class="response" id="response-partidos"></div>
        </div>
		
		        <div class="endpoint">
            <h2>Get Partidos by temporada</h2>
            <pre>GET /api/partidos/{idtemporada}</pre>
            <input type="text" id="input-temporada-id-season" placeholder="Enter idtemporada">
            <button class="btn" onclick="fetchData('./api/partidos/temporada/' + document.getElementById('input-temporada-id-season').value, 'response-temporada-season')">Try it out</button>
            <div class="response" id="response-temporada-season"></div>
        </div>

        <div class="endpoint">
            <h2>Get Partido by ID</h2>
            <pre>GET /api/partidos/{idpartido}</pre>
            <input type="text" id="input-partido-id" placeholder="Enter idpartido">
            <button class="btn" onclick="fetchData('./api/partidos/' + document.getElementById('input-partido-id').value, 'response-partido')">Try it out</button>
            <div class="response" id="response-partido"></div>
        </div>
    </div>

    <script>
        function fetchData(endpoint, responseId) {
            fetch(endpoint)
                .then(response => response.json())
                .then(data => {
                    const responseElement = document.getElementById(responseId);
                    responseElement.textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    console.error('Error:', error);
                    const responseElement = document.getElementById(responseId);
                    responseElement.textContent = 'Error: ' + error;
                });
        }
    </script>
</body>
</html>
