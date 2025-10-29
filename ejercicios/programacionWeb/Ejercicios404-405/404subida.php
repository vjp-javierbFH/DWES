<?php
// 404subida.php

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['btnSubir'])) {
    die('Acceso no permitido.');
}

// === 1. Validar campos numéricos ===
$anchura = filter_input(INPUT_POST, 'anchura', FILTER_VALIDATE_INT);
$altura  = filter_input(INPUT_POST, 'altura',  FILTER_VALIDATE_INT);

if ($anchura === false || $altura === false || $anchura <= 0 || $altura <= 0) {
    die('<p class="error">Error: La anchura y altura deben ser números enteros positivos.</p>');
}

// === 2. Validar archivo subido ===
if (!isset($_FILES['archivoEnviado']) || $_FILES['archivoEnviado']['error'] !== UPLOAD_ERR_OK) {
    $errores = [
        UPLOAD_ERR_INI_SIZE   => 'El archivo excede el tamaño máximo permitido por PHP.',
        UPLOAD_ERR_FORM_SIZE  => 'El archivo excede el tamaño máximo del formulario.',
        UPLOAD_ERR_PARTIAL    => 'El archivo se subió solo parcialmente.',
        UPLOAD_ERR_NO_FILE    => 'No se ha seleccionado ningún archivo.',
        UPLOAD_ERR_NO_TMP_DIR => 'Falta la carpeta temporal.',
        UPLOAD_ERR_CANT_WRITE => 'Error al escribir el archivo en disco.',
        UPLOAD_ERR_EXTENSION  => 'Una extensión PHP detuvo la subida.'
    ];
    $msg = $errores[$_FILES['archivoEnviado']['error']] ?? 'Error desconocido al subir el archivo.';
    die("<p class='error'>$msg</p>");
}

$archivo = $_FILES['archivoEnviado'];
$nombreOriginal = pathinfo($archivo['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

// === 3. Validar tipo de archivo (solo imágenes) ===
$tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
if (!in_array($extension, $tiposPermitidos)) {
    die("<p class='error'>Error: Solo se permiten imágenes ($tiposPermitidos).</p>");
}

// Verificar con getimagesize (más seguro que la extensión)
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $archivo['tmp_name']);
finfo_close($finfo);

$mimesPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
if (!in_array($mime, $mimesPermitidos)) {
    die("<p class='error'>Error: Tipo de archivo no permitido ($mime).</p>");
}

// === 4. Generar nombre único y mover archivo ===
$carpetaDestino = 'subidas/';
if (!is_dir($carpetaDestino)) {
    mkdir($carpetaDestino, 0755, true);
}

$nuevoNombre = $nombreOriginal . '_' . time() . '.' . $extension;
$rutaFinal = $carpetaDestino . $nuevoNombre;

if (!move_uploaded_file($archivo['tmp_name'], $rutaFinal)) {
    die("<p class='error'>Error al guardar el archivo en el servidor.</p>");
}

// === 5. Verificar dimensiones reales de la imagen ===
list($anchoReal, $altoReal) = getimagesize($rutaFinal);

// === 6. Mostrar resultado ===
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Subida Exitosa</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        .success {
            color: green;
        }

        .info {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <h2 class="success">¡Archivo subido correctamente!</h2>

    <div class="info">
        <p><strong>Nombre original:</strong> <?= htmlspecialchars($archivo['name']) ?></p>
        <p><strong>Nombre guardado:</strong> <?= htmlspecialchars($nuevoNombre) ?></p>
        <p><strong>Tamaño:</strong> <?= number_format($archivo['size'] / 1024, 2) ?> KB</p>
        <p><strong>Anchura solicitada:</strong> <?= $anchura ?> px</p>
        <p><strong>Altura solicitada:</strong> <?= $altura ?> px</p>
        <p><strong>Dimensiones reales:</strong> <?= $anchoReal ?> × <?= $altoReal ?> px</p>
    </div>

    <p><img src="<?= $rutaFinal ?>" alt="Imagen subida" style="max-width: 500px; border: 1px solid #ccc;"></p>

    <p><a href="404subida.html">← Subir otra imagen</a></p>
</body>

</html>