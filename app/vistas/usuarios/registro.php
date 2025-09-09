<?php require_once(__DIR__ . '/../../../config/config.php'); ?>
<form action="<?php echo BASE_URL; ?>/registro/guardar" method="post">
    <div>
        <label for="nombre_usuario">Nombre de usuario<small>*</small>:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" required>
    </div>
    <div>
        <label for="email">Correo electrónico*:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="contrasena">Contraseña*:</label>
        <input type="password" name="contrasena" id="contrasena" required>
    </div>
    <div><input type="submit" value="Registrarse"></div>
</form>