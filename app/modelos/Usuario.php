<?php
require_once('config/Database.php');

class Usuario {
    private $id; // id autonumerico
    private $nombreUsuario;
    private $email;
    private $contrasena;
    private $bd; // copia de la conexion
    
    public function __construct($nombreUsuario, $email, $contrasena, $id=0, $bd)
    {
        $this->nombreUsuario=$nombreUsuario;
        $this->email=$email;
        if (self::esCorrectaContrasena($contrasena)) {
            $this->contrasena=$contrasena;
        }
        $this->bd=$bd;
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
    
    // Opreaciones del CRUD. Se podrian hacer en otra clase
    public function getUsuarioPorNU($nombreUsuario){
        $stmt = $this->bd->prepare("SELECT * FROM usuarios WHERE nombre_usuario= ?");
        $stmt->execute([$nombreUsuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $this->id=$user['id'];
            $this->nombreUsuario=$user['nombre_usuario'];
            $this->contrasena =$user['contrasena'] ;
            $this->email=$user['email'];
        }
    }

    public static function getListaUsuarios($bd) {
        $stmt = $bd->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    /** Métodeo de la clase qye insert o actualiza un usuario */
    public function guardar() {
        if ($this->id==0) {
            // queremos insertar
            $stmt = $this->bd->prepare("INSERT INTO usuarios(nombre_usuario, email, contrasena) VALUES(?,?,?)");
            $resultado= $stmt->execute([$this->nombreUsuario, $this->email, 
            password_hash($this->contrasena,PASSWORD)]); // cifra la contraseña Ej: rasmuslerdorf -> $2y$12$4Umg0rCJwMswRw/l.SwHvuQV01coP0eWmGzd61QH2RvAOMANUBGC.
            if ($resultado) {
                $this->id=$this->bd->lastInsertId();
            }
        } else {
            //actualizar
            $stmt = $this->bd->prepare("UPDATE usuarios SET nombre_usuario=?, email=?, contrasena=? WHERE id=?");
            $resultado=$stmt->execute([$this->nombreUsuario,$this->email,$this->contrasena, $this->id]);
        }
        return $resultado;
    }

    public function borrar() {
        $stmt = $this->bd->prepare("DELETE FROM usuarios  WHERE id = ?");
        return $stmt->execute([$this->id]);
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