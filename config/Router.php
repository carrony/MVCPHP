<?php
require_once(__DIR__ . '/../config/config.php'); 
/**
 * Clase auxiliar que se encarga deque controlador hay que invocarcon cada url que se introduzca enel navegador
 */
class Router {

    public static function enrutar($uri,$bd) {
        switch($uri) {
            // registro usuarios
            case '/index.php':
            case '/':
                require_once(__DIR__ . '/../app/vistas/layout.php'); // carga el layout con esa vista
                break;
            case '/registro':
                require_once(__DIR__ . '/../app/controladores/UsuarioController.php');
                $controlador= new UsuarioController($bd);
                $controlador->mostrar_registro();
                break;
            default:
                http_response_code(404);
                echo "<h2> 404 - Página no encontrada </h2>";
                break;
        }
    }
}

?>