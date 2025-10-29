<?php
// 406contadorVisitas.php - Contador de visitas con cookies + reinicio

// Duración de la cookie: 1 año (puedes cambiarlo)
$duracionCookie = time() + (365 * 24 * 60 * 60);

// Nombre de la cookie
$nombreCookie = 'contador_visitas';

// === 1. ¿El usuario quiere reiniciar el contador? ===
if (isset($_GET['reiniciar']) && $_GET['reiniciar'] === '1') {
    // Eliminar cookie estableciendo tiempo en el pasado
    setcookie($nombreCookie, '', time() - 3600, '/');
    // Redirigir para evitar reenvío del formulario
    header('Location: 406contadorVisitas.php');
    exit;
}

// === 2. Leer cookie actual (si existe) ===
$visitas = 0;
if (isset($_COOKIE[$nombreCookie])) {
    $visitas = (int)$_COOKIE[$nombreCookie];
}

// === 3. Incrementar contador ===
$visitas++;

// === 4. Guardar nueva cookie ===
setcookie($nombreCookie, $visitas, $duracionCookie, '/');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador de Visitas - 406</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 50px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .mensaje {
            font-size: 1.4em;
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
            font-weight: bold;
        }
        .primera {
            background: #d5f5e3;
            color: #2e8b57;
            border: 2px solid #2e8b57;
        }
        .repetida {
            background: #fef9e1;
            color: #d35400;
            border: 2px solid #f39c12;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }
        .footer {
            margin-top: 40px;
            font-size: 0.9em;
            color: #7f8c8d;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Contador de Visitas</h1>

    <?php if ($visitas === 1): ?>
        <div class="mensaje primera">
            ¡Bienvenido! Esta es tu <strong>primera visita</strong>.
        </div>
    <?php else: ?>
        <div class="mensaje repetida">
            Has visitado esta página <strong><?= $visitas ?></strong> veces.
        </div>
    <?php endif; ?>

    <a href="406contadorVisitas.php?reiniciar=1" class="btn" 
       onclick="return confirm('¿Estás seguro de que quieres reiniciar el contador?');">
       Reiniciar Contador
    </a>
</div>

<div class="footer">
    <p>Las visitas se guardan en una cookie que dura 1 año.</p>
</div>

</body>
</html>