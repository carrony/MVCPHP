<?php

/**
 * Clase auxiliar que se encarga deque controlador hay que invocarcon cada url que se introduzca enel navegador
 */
class Router {

    public static function enrutar($uri,$bd) {
        switch($uri) {
            // registro usuarios
            case '/registro':
                require_once('app/controladores/UsuarioController.php');
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