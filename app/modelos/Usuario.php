<?php
class Usuario {
    private $id; // id autonumerico
    private $nombreUsuario;
    private $email;
    private $contrasena;
    
    public function __construct($nombreUsuario, $email, $contrasena, $id=0)
    {
        $this->nombreUsuario=$nombreUsuario;
        $this->email=$email;
        if (self::esCorrectaContrasena($contrasena)) {
            $this->contrasena=$contrasena;
        }
    }

    public static function esCorrectaContrasena($contrasena){
        // ^: Inicio de la cadena
        // (?=.*[a-z]): Al menos una minúscula
        // (?=.*[A-Z]): Al menos una mayúscula
        // (?=.*\d): Al menos un número (dígito)
        // (?=.*[@$!%*?&]): Al menos un carácter especial (ejemplo)
        // [a-zA-Z\d@$!%*?&]+: Todos los caracteres permitidos
        // $: Fin de la cadena
        $patron = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[a-zA-Z\d@$!%*?&]+$/";
        return preg_match($patron,$contrasena); 
    }
    



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombreUsuario
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set the value of nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario): self
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of contrasena
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     */
    public function setContrasena($contrasena): self
    {
        $this->contrasena = $contrasena;

        return $this;
    }
}
?>