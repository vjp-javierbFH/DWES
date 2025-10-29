<?php
// 409formulario3.php - Paso 3: Mostrar todos los datos
session_start();

// === Validar datos del paso 2 ===
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['datos1'])) {
    header('Location: 409formulario1.php');
    exit;
}

// Recoger y sanitizar datos del paso 2
$convivientes = filter_input(INPUT_POST, 'convivientes', FILTER_VALIDATE_INT);
$aficiones = isset($_POST['aficiones']) ? array_map('htmlspecialchars', $_POST['aficiones']) : [];
$menu = htmlspecialchars($_POST['menu'] ?? 'No seleccionado');

// Combinar todos los datos
$datos = $_SESSION['datos1'];
$datos['convivientes'] = $convivientes;
$datos['aficiones'] = $aficiones;
$datos['menu'] = $menu;

// Limpiar sesión (opcional)
unset($_SESSION['datos1']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen Final - 409</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f7f9;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            color: #2c3e50;
            font-weight: bold;
        }

        .aficiones {
            padding-left: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn:hover {
            background: #2980b9;
        }

        .success {
            color: #27ae60;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Resumen Completo</h1>
        <p class="success">¡Todos los datos han sido recogidos correctamente!</p>

        <table>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><?= $datos['nombre'] ?></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><?= $datos['apellidos'] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $datos['email'] ?></td>
            </tr>
            <tr>
                <td>URL</td>
                <td><a href="<?= $datos['url'] ?>" target="_blank"><?= $datos['url'] ?></a></td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td><?= ucfirst($datos['sexo']) ?></td>
            </tr>
            <tr>
                <td>Convivientes</td>
                <td><?= $datos['convivientes'] ?></td>
            </tr>
            <tr>
                <td>Aficiones</td>
                <td>
                    <?php if (!empty($datos['aficiones'])): ?>
                        <ul class="aficiones">
                            <?php foreach ($datos['aficiones'] as $aficion): ?>
                                <li><?= ucfirst($aficion) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        Ninguna
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Menú favorito</td>
                <td><?= ucfirst($datos['menu']) ?></td>
            </tr>
        </table>

        <a href="409formulario1.php" class="btn">Volver al Inicio</a>
    </div>
</body>

</html>