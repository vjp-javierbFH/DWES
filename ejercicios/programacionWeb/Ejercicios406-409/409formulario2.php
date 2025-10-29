<?php
// 409formulario2.php - Paso 2: Guardar en sesión + segundo formulario
session_start();

// === Validar y guardar datos del paso 1 ===
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: 409formulario1.php');
    exit;
}

$campos = ['nombre', 'apellidos', 'email', 'url', 'sexo'];
foreach ($campos as $campo) {
    if (!isset($_POST[$campo]) || empty(trim($_POST[$campo]))) {
        die("<p style='color:red; text-align:center;'>Error: Todos los campos son obligatorios.</p>");
    }
}

// Sanitizar
$_SESSION['datos1'] = [
    'nombre'    => htmlspecialchars(trim($_POST['nombre'])),
    'apellidos' => htmlspecialchars(trim($_POST['apellidos'])),
    'email'     => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
    'url'       => filter_var($_POST['url'], FILTER_SANITIZE_URL),
    'sexo'      => $_POST['sexo']
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario 2/3 - Preferencias</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f7f9; }
        .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; }
        label { display: block; margin: 15px 0 5px; font-weight: bold; color: #34495e; }
        input[type="number"] { width: 80px; padding: 8px; }
        .checkbox-group { margin: 10px 0; }
        .checkbox-group label { display: block; margin: 8px 0; font-weight: normal; }
        select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 1em; }
        input[type="submit"] {
            margin-top: 25px; padding: 12px 30px; background: #27ae60; color: white; border: none; border-radius: 5px; font-size: 1.1em; cursor: pointer;
        }
        input[type="submit"]:hover { background: #1e8449; }
        .progress { text-align: center; color: #7f8c8d; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">
    <div class="progress">Paso 2 de 3</div>
    <h1>Preferencias y Hábitos</h1>
    <form action="409formulario3.php" method="POST">
        <label>Nº de convivientes:</label>
        <input type="number" name="convivientes" min="0" max="20" value="1" required>

        <label>Aficiones:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="aficiones[]" value="deporte"> Deporte</label>
            <label><input type="checkbox" name="aficiones[]" value="lectura"> Lectura</label>
            <label><input type="checkbox" name="aficiones[]" value="viajar"> Viajar</label>
            <label><input type="checkbox" name="aficiones[]" value="cine"> Cine</label>
            <label><input type="checkbox" name="aficiones[]" value="musica"> Música</label>
        </div>

        <label>Menú favorito:</label>
        <select name="menu" required>
            <option value="">-- Elige uno --</option>
            <option value="ensalada">Ensalada</option>
            <option value="pasta">Pasta</option>
            <option value="carne">Carne</option>
            <option value="pescado">Pescado</option>
            <option value="vegetariano">Vegetariano</option>
        </select>

        <input type="submit" value="Ver Resumen">
    </form>
</div>
</body>
</html>