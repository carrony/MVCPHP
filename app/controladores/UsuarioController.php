<?php
require_once(__DIR__ . '/../modelos/Usuario.php');
    class UsuarioController {
        private $bd;

        public function __construct($bd) {
            $this->bd=$bd;
        }

        /**
         * El controlador es el nexo de unión entre el modelo y la vista. De tal manera que será el encargado de invocar al modelo para recuperar los datos de la bases de datos y enviárselos a la vista para que se encargue de su visualización
         */

        /**
         * Funcion del controlador que muestra el registro de usuario
         */
        public function mostrar_registro() {
            $vista = __DIR__ . '/../vistas/usuarios/registro.php';
            require(__DIR__ . '/../vistas/layout.php');
        }


    }
?>