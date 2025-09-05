<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone - Tienda de informática</title>
    <link rel="stylesheet" href="../../public/assests/estilos.css">
</head>
<body>
    <header>
        <h1>TEchZone - Tu tienda de informática</h1>
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
            </ul>
        </nav>
        <div class="botones-login">
            <a href="/registro">Registrarse</a>
        </div>
    </header>
    <main>
        <?php include($vista); ?>
    </main>
    <footer>
        <p>$copy; <?=date('Y') ?> TechZone. Todo los derechos reservados. </p>
    </footer>
</body>
</html>