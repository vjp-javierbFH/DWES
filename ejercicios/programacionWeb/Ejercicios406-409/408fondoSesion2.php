<?php
// 408fondoSesion2.php - Mostrar color + volver + destruir sesión

session_start();

// === Color actual (de sesión o por defecto) ===
$colorActual = $_SESSION['color_fondo'] ?? 'white';

$coloresPermitidos = [
    'white'       => 'Blanco',
    'lightblue'   => 'Azul Claro',
    'lightgreen'  => 'Verde Claro',
    'lightyellow' => 'Amarillo Claro',
    'lightcoral'  => 'Coral Claro',
    'lavender'    => 'Lavanda'
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Color de Fondo - Sesión 2 (408)</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: <?= htmlspecialchars($colorActual) ?>;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.5s ease;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
            flex: 1;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .color-info {
            font-size: 1.3em;
            padding: 15px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            margin: 20px 0;
            font-weight: bold;
            color: #2c3e50;
        }

        .botones {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-volver {
            background: #3498db;
            color: white;
        }

        .btn-volver:hover {
            background: #2980b9;
        }

        .btn-destruir {
            background: #e74c3c;
            color: white;
        }

        .btn-destruir:hover {
            background: #c0392b;
        }

        .info {
            margin-top: 30px;
            font-size: 0.9em;
            color: #7f8c8d;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Página 2 - Sesión Activa</h1>

        <div class="color-info">
            Color de fondo actual: <strong><?= $coloresPermitidos[$colorActual] ?></strong>
        </div>

        <div class="botones">
            <a href="408fondoSesion1.php" class="btn btn-volver">
                Volver a Página 1
            </a>

            <a href="408fondoSesion2.php?destruir=1" class="btn btn-destruir"
                onclick="return confirm('¿Vaciar sesión y volver al color por defecto?');">
                Vaciar Sesión y Volver
            </a>
        </div>

        <?php
        // === Procesar destrucción de sesión ===
        if (isset($_GET['destruir']) && $_GET['destruir'] === '1') {
            session_unset();
            session_destroy();
            // Redirigir para evitar reenvío
            header('Location: 408fondoSesion1.php');
            exit;
        }
        ?>

        <div class="info">
            La sesión se mantiene mientras no cierres el navegador.
        </div>
    </div>

</body>

</html>