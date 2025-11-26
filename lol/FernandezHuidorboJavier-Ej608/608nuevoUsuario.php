<?php
// 608nuevoUsuario.php - SOLUCIÓN DEFINITIVA Y CORRECTA

// PROHIBIDO acceso directo sin formulario
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('<h1 style="color:red;text-align:center;margin-top:100px;">ACCESO DENEGADO</h1>');
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=lol;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Recoger y limpiar datos
$nombre   = trim($_POST['nombre']   ?? '');
$usuario  = trim($_POST['usuario']  ?? '');
$password = $_POST['password']     ?? '';
$email    = trim($_POST['email']    ?? '');

// Validación estricta: ningún campo vacío
if ($nombre === '' || $usuario === '' || $password === '' || $email === '') {
    die('<h2 style="color:#ff6b6b;text-align:center;margin-top:100px;">Todos los campos son obligatorios.</h2>');
}

if (strlen($password) < 6) {
    die('<h2 style="color:#ff6b6b;text-align:center;margin-top:100px;">La contraseña debe tener al menos 6 caracteres.</h2>');
}

// CIFRADO DE CONTRASEÑA (OBLIGATORIO)
$password_hash = password_hash($password, PASSWORD_BCRYPT);

try {
    $sql = "INSERT INTO usuario (nombre, usuario, password, email) 
            VALUES (:nombre, :usuario, :password, :email)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nombre'   => $nombre,
        ':usuario'  => $usuario,
        ':password' => $password_hash,
        ':email'    => $email
    ]);

    // MENSAJE EXACTO QUE PIDE EL PROFESOR
    echo "<h2 style='color:#51cf66; text-align:center; margin-top:100px;'>
            El usuario <strong>$usuario</strong> ha sido introducido en el sistema 
            con la contraseña <strong>$password</strong>.
          </h2>";
    echo "<p style='text-align:center;'><a href='608resgistro.html' style='color:#c89b3c;text-decoration:none;'>Volver al registro</a></p>";

} catch (PDOException $e) { // Captura la excepción
    if ($e->getCode() == 23000) {
        echo "<h2 style='color:#ff6b6b;text-align:center;margin-top:100px;'>
                Error: El usuario o email ya existe.
              </h2>";
    } else {
        echo "<h2 style='color:red;text-align:center;'>Error: " . $e->getMessage() . "</h2>";
    }
}
?>