<?php
// 408fondoSesion1.php - Cambiar color de fondo con SESIÓN

session_start();

// === Colores permitidos ===
$coloresPermitidos = [
    'white'       => 'Blanco',
    'lightblue'   => 'Azul Claro',
    'lightgreen'  => 'Verde Claro',
    'lightyellow' => 'Amarillo Claro',
    'lightcoral'  => 'Coral Claro',
    'lavender'    => 'Lavanda'
];

// === Procesar selección del usuario ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
    $color = $_POST['color'];
    if (array_key_exists($color, $coloresPermitidos)) {
        $_SESSION['color_fondo'] = $color;
    }
}

// === Color actual (de sesión o por defecto) ===
$colorActual = $_SESSION['color_fondo'] ?? 'white';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Color de Fondo - Sesión 1 (408)</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
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
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            text-align: center;
            flex: 1;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            margin: 15px 0;
            font-size: 1.1em;
        }
        form {
            margin: 25px 0;
        }
        select {
            padding: 12px 20px;
            font-size: 1.1em;
            border: 2px solid #3498db;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            width: 220px;
        }
        select:focus {
            outline: none;
            border-color: #2980b9;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.4);
        }
        input[type="submit"] {
            margin-left: 10px;
            padding: 12px 24px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
        .enlace {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 24px;
            background: #2ecc71;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }
        .enlace:hover {
            background: #27ae60;
        }
        .info {
            margin-top: 20px;
            font-size: 0.9em;
            color: #7f8c8d;
            font-style: italic;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Página 1 - Color con Sesión</h1>
    
    <p>Elige un color de fondo. Se guardará en la <strong>sesión</strong> (hasta cerrar el navegador).</p>

    <form method="POST">
        <select name="color" onchange="this.form.submit()">
            <?php foreach ($coloresPermitidos as $valor => $nombre): ?>
                <option value="<?= $valor ?>" <?= $colorActual === $valor ? 'selected' : '' ?>>
                    <?= $nombre ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Aplicar">
    </form>

    <p>
        <a href="408fondoSesion2.php" class="enlace">
            Ir a Página 2
        </a>
    </p>

    <div class="info">
        Color actual: <strong><?= $coloresPermitidos[$colorActual] ?></strong>
    </div>
</div>

</body>
</html>