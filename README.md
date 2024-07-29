## Football soccer team Api database

### Info

PHP language and Codeigniter 4.5.3 framework were utilized in this application.

### Server Requirements

- php > 7.5
- mysql / mariadb > 5.1

## How to use

### Step 1: Install the database

Import database example database-example.sql
```
mysql -u username -p futbol-back < database-example.sql
```

### Step 2: Set up database

Edit file app/Config/Database.php with your variables database
```
public $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'futbol-back',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => (ENVIRONMENT !== 'production'),
    'cacheOn'  => false,
    'cacheDir' => '',
    'charset'  => 'utf8',
    'DBCollat' => 'utf8_general_ci',
    'swapPre'  => '',
    'encrypt'  => false,
    'compress' => false,
    'strictOn' => false,
    'failover' => [],
    'port'     => 3306,
];
```

### Steps 3: The application's models

The following are the app's models:
```
- app\Models\EntrenadorModel.php
- app\Models\JugadorModel.php
- app\Models\Partido\Model.php
- app\Models\TemporadaModel.php
```

### Steps 4: The application's controllers

The following people are in charge of the app:
```
- app\Controllers\EntrenadorModel.php
- app\Controllers\JugadorModel.php
- app\Controllers\Partido\Model.php
- app\Controllers\TemporadaModel.php
```

### Step 5: The app's routes

The following are the routes available in the app:
```
$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('temporadas', 'Temporadas::index'); // http://localhost/futbol-back/public/api/temporadas 
    $routes->get('temporadas/(:num)', 'Temporadas::show/$1'); // 
}); 

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('entrenadores', 'Entrenadores::index'); // http://localhost/futbol-back/public/api/entrenadores/
    $routes->get('entrenadores/(:num)', 'Entrenadores::show/$1'); // http://localhost/futbol-back/public/api/entrenadores/232400
});

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('jugadores', 'Jugadores::index'); // http://localhost/futbol-back/public/api/jugadores
    $routes->get('jugadores/(:num)', 'Jugadores::show/$1'); //http://localhost/futbol-back/public/api/jugadores/232401
    $routes->get('jugadores/(:num)/temporadas/(:num)', 'Jugadores::partidos/$1/$2'); // http://localhost/futbol-back/public/api/jugadores/232401/temporadas/2324

});

$routes->group('api', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('partidos', 'Partidos::index'); // http://localhost/futbol-back/public/api/partidos/
    $routes->get('partidos/temporada/(:num)', 'Partidos::temporada/$1'); // http://localhost/futbol-back/public/api/partidos/temporada/2324
    $routes->get('partidos/(:num)', 'Partidos::show/$1'); // http://localhost/futbol-back/public/api/partidos/232401
});

$routes->get('/', 'ApiDoc::index'); //View API doc
```

### Step 6: URL to display the app's data

##### API Documentation
http://localhost/futbol-back/public/api/

##### The team's seasons 
http://localhost/futbol-back/public/api/temporadas 

##### The team's seasons
http://localhost/futbol-back/public/api/temporadas/2324

##### The team's coaches 
http://localhost/futbol-back/public/api/entrenadores/

##### The team's coach
http://localhost/futbol-back/public/api/entrenadores/232400

##### Team players
http://localhost/futbol-back/public/api/jugadores

##### Team player
http://localhost/futbol-back/public/api/jugadores/232401

##### Place the player in the team's season
http://localhost/futbol-back/public/api/jugadores/232401/temporadas/2324

##### The team's matches
http://localhost/futbol-back/public/api/partidos/

##### The team's season matches
http://localhost/futbol-back/public/api/partidos/temporada/2324

##### The team's match
http://localhost/futbol-back/public/api/partidos/232401


### Step 7: Insert data in a database

Follow the nex order:

- Insert the season data in the tabla temporada
- Insert the player datra in the table jugador
- Insert the match data in the table partidos
- Insert the player in the match data in the table partidojugador




