<?php
require_once(__DIR__ . '/../../config/config.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone - Tienda de informática</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assests/estilos.css">
</head>
<body>
    <header>
        <h1>TEchZone - Tu tienda de informática</h1>
        <nav>
            <ul>
                <li><a href="<?php echo BASE_URL; ?>/">Inicio</a></li>
            </ul>
        </nav>
        <div class="botones-login">
            <a href="<?php echo BASE_URL; ?>/registro">Registrarse</a>
        </div>
    </header>
    <main>
        <?php if (isset($vista)) include($vista); ?>
    </main>
    <footer>
        <p>&copy; <?=date('Y') ?> TechZone. Todo los derechos reservados. </p>
    </footer>
</body>
</html>