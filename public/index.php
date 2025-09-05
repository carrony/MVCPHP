<?php
// Inicia las sesiones HTTP para poder guardar variables en la sesión y manetener estado entre unas páginas y otras
session_start();

// Cargarmos los ficheros PHP necesarios
require_once('config/Database.php');
require_once('config/Router.php');

// Obtenemos una conexión a la base de datos
$bd = Database::getInstancia();

// Obtenemos la URI de la petición HTTP
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
Router::enrutar($uri,$bd);

?>