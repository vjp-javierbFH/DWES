<?php
// 402formulario.php - Procesar formulario con seguridad

// Validar que todos los campos requeridos lleguen
$camposRequeridos = ['nombre', 'apellidos', 'email', 'url', 'sexo', 'numConvivientes', 'menuFavorito'];
foreach ($camposRequeridos as $campo) {
    if (!isset($_POST[$campo]) || trim($_POST[$campo]) === '') {
        die("<p class='text-danger text-center'>Error: Todos los campos son obligatorios.</p>");
    }
}

// Recoger y sanitizar datos
$nombre = htmlspecialchars(trim($_POST['nombre']));
$apellidos = htmlspecialchars(trim($_POST['apellidos']));
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
$sexo = htmlspecialchars($_POST['sexo']);
$numConvivientes = (int)$_POST['numConvivientes'];
$menuFavorito = htmlspecialchars($_POST['menuFavorito']);

// Aficiones (array)
$aficiones = [];
if (isset($_POST['aficiones']) && is_array($_POST['aficiones'])) {
    foreach ($_POST['aficiones'] as $aficion) {
        $aficiones[] = htmlspecialchars($aficion);
    }
}
$aficionesLista = !empty($aficiones) ? '<ul><li>' . implode('</li><li>', $aficiones) . '</li></ul>' : 'Ninguna';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - 402</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            padding: 2rem;
        }

        .result-container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        table {
            font-size: 1.1rem;
        }

        th {
            background: #e9ecef;
        }

        .btn-home {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="result-container">
            <h2>Resumen de tus datos</h2>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nombre</th>
                    <td><?= $nombre ?></td>
                </tr>
                <tr>
                    <th>Apellidos</th>
                    <td><?= $apellidos ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <th>URL</th>
                    <td><a href="<?= $url ?>" target="_blank"><?= $url ?></a></td>
                </tr>
                <tr>
                    <th>Sexo</th>
                    <td><?= $sexo ?></td>
                </tr>
                <tr>
                    <th>Convivientes</th>
                    <td><?= $numConvivientes ?></td>
                </tr>
                <tr>
                    <th>Aficiones</th>
                    <td><?= $aficionesLista ?></td>
                </tr>
                <tr>
                    <th>Menú favorito</th>
                    <td><?= $menuFavorito ?></td>
                </tr>
            </table>

            <div class="text-center">
                <a href="402formulario.html" class="btn btn-primary btn-home">Volver al Formulario</a>
            </div>
        </div>
    </div>

</body>

</html>