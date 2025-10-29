<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['btnSubir'])) {
    die('Acceso no permitido.');
}

$anchura = filter_input(INPUT_POST, 'anchura', FILTER_VALIDATE_INT);
$altura  = filter_input(INPUT_POST, 'altura',  FILTER_VALIDATE_INT);

if ($anchura === false || $altura === false || $anchura <= 0 || $anchura > 5000 || $altura <= 0 || $altura > 5000) {
    $_SESSION['error'] = 'Error: Dimensiones inválidas (1-5000 px).';
    header('Location: 405subidaModificado.html');
    exit;
}

if (!isset($_FILES['archivoEnviado']) || $_FILES['archivoEnviado']['error'] !== UPLOAD_ERR_OK) {
    $msg = [
        UPLOAD_ERR_INI_SIZE   => 'Archivo demasiado grande (PHP).',
        UPLOAD_ERR_FORM_SIZE  => 'Archivo excede límite del formulario.',
        UPLOAD_ERR_PARTIAL    => 'Subida incompleta.',
        UPLOAD_ERR_NO_FILE    => 'No se seleccionó archivo.',
    ][$_FILES['archivoEnviado']['error']] ?? 'Error de subida.';
    $_SESSION['error'] = $msg;
    header('Location: 405subidaModificado.html');
    exit;
}

$archivo = $_FILES['archivoEnviado'];
$tmp_name = $archivo['tmp_name'];

if (!is_uploaded_file($tmp_name)) {
    $_SESSION['error'] = 'Archivo no subido correctamente.';
    header('Location: 405subidaModificado.html');
    exit;
}

$nombreOriginal = pathinfo($archivo['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));
$nombreMostrar = $archivo['name'];
$tamanoKB = number_format($archivo['size'] / 1024, 2);

$tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
if (!in_array($extension, $tiposPermitidos)) {
    $_SESSION['error'] = 'Solo imágenes: .jpg, .png, .gif, .webp';
    header('Location: 405subidaModificado.html');
    exit;
}

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = $finfo ? finfo_file($finfo, $tmp_name) : false;
finfo_close($finfo);

if (!$mime || !in_array($mime, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
    $_SESSION['error'] = 'Archivo no es una imagen válida.';
    header('Location: 405subidaModificado.html');
    exit;
}

$carpetaDestino = 'subidas/';
if (!is_dir($carpetaDestino)) mkdir($carpetaDestino, 0755, true);

$nuevoNombre = $nombreOriginal . '_' . time() . '.' . $extension;
$rutaFinal = $carpetaDestino . $nuevoNombre;

if (!move_uploaded_file($tmp_name, $rutaFinal)) {
    $_SESSION['error'] = 'Error al guardar imagen.';
    header('Location: 405subidaModificado.html');
    exit;
}

list($anchoReal, $altoReal) = getimagesize($rutaFinal);
if (!$anchoReal) {
    unlink($rutaFinal);
    $_SESSION['error'] = 'Imagen corrupta.';
    header('Location: 405subidaModificado.html');
    exit;
}

unset($archivo, $tmp_name, $finfo, $mime);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Éxito - 405</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f9f9f9; }
        .success { color: #2e8b57; font-weight: bold; }
        .info { background: #e8f5e9; padding: 15px; border-left: 5px solid #2e8b57; border-radius: 5px; margin: 15px 0; }
        img { border: 2px solid #ccc; border-radius: 5px; margin-top: 10px; }
        a { color: #0066cc; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <h2 class="success">¡Subida exitosa!</h2>
    <div class="info">
        <p><strong>Original:</strong> <?= htmlspecialchars($nombreMostrar) ?></p>
        <p><strong>Guardado:</strong> <?= htmlspecialchars($nuevoNombre) ?></p>
        <p><strong>Tamaño:</strong> <?= $tamanoKB ?> KB</p>
        <p><strong>Solicitado:</strong> <?= $anchura ?> × <?= $altura ?> px</p>
        <p><strong>Real:</strong> <?= $anchoReal ?> × <?= $altoReal ?> px</p>
    </div>
    <p><strong>Vista previa:</strong><br>
        <img src="<?= htmlspecialchars($rutaFinal) ?>" width="<?= $anchura ?>" height="<?= $altura ?>" alt="Imagen">
    </p>
    <p><a href="405subidaModificado.html">Subir otra</a></p>
</body>
</html>