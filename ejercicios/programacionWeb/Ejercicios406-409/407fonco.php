<?php
// 407fondo.php - Cambiar color de fondo con cookie (24h)

// === 1. Configuración de la cookie ===
$nombreCookie = 'color_fondo';
$duracionCookie = time() + (24 * 60 * 60); // 24 horas

// === 2. Procesar selección del usuario ===
$colorSeleccionado = 'white'; // Color por defecto

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) {
    $coloresPermitidos = ['white', 'lightblue', 'lightgreen', 'lightyellow', 'lightcoral', 'lavender'];
    $color = $_POST['color'];
    
    if (in_array($color, $coloresPermitidos)) {
        $colorSeleccionado = $color;
        // Guardar en cookie
        setcookie($nombreCookie, $color, $duracionCookie, '/');
    }
}
// === 3. Leer cookie si existe ===
elseif (isset($_COOKIE[$nombreCookie])) {
    $coloresPermitidos = ['white', 'lightblue', 'lightgreen', 'lightyellow', 'lightcoral', 'lavender'];
    $colorCookie = $_COOKIE[$nombreCookie];
    
    if (in_array($colorCookie, $coloresPermitidos)) {
        $colorSeleccionado = $colorCookie;
    }
}

// === 4. Aplicar color al fondo ===
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Color de Fondo - 407</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: <?= htmlspecialchars($colorSeleccionado) ?>;
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
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            text-align: center;
            flex: 1;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 2em;
        }
        p {
            margin: 15px 0;
            font-size: 1.1em;
            line-height: 1.6;
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
            transition: all 0.3s;
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
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        .info {
            margin-top: 30px;
            font-size: 0.9em;
            color: #7f8c8d;
            font-style: italic;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #95a5a6;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cambiar Color de Fondo</h1>
    
    <p>Elige un color de fondo para esta página. Se guardará durante <strong>24 horas</strong>.</p>

    <form method="POST" action="">
        <select name="color" onchange="this.form.submit()">
            <option value="white"      <?= $colorSeleccionado === 'white' ? 'selected' : '' ?>>Blanco</option>
            <option value="lightblue"  <?= $colorSeleccionado === 'lightblue' ? 'selected' : '' ?>>Azul Claro</option>
            <option value="lightgreen" <?= $colorSeleccionado === 'lightgreen' ? 'selected' : '' ?>>Verde Claro</option>
            <option value="lightyellow"<?= $colorSeleccionado === 'lightyellow' ? 'selected' : '' ?>>Amarillo Claro</option>
            <option value="lightcoral" <?= $colorSeleccionado === 'lightcoral' ? 'selected' : '' ?>>Coral Claro</option>
            <option value="lavender"   <?= $colorSeleccionado === 'lavender' ? 'selected' : '' ?>>Lavanda</option>
        </select>
        <input type="submit" value="Aplicar">
    </form>

    <div class="info">
        Color actual: <strong><?= ucfirst(str_replace('light', '', $colorSeleccionado)) ?></strong>
        <br>
        (Cierra el navegador y vuelve: ¡el color se mantiene!)
    </div>
</div>

<div class="footer">
    <p>407fondo.php - Usa cookies para recordar tu preferencia</p>
</div>

</body>
</html>