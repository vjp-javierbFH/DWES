<?php
// 608nuevoUsuario.php - Script para procesar el registro de nuevos usuarios

// Verificar si se ha accedido mediante el método POST
// Esto evita que se acceda directamente al archivo desde la URL sin enviar datos
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('<h1 style="color:red;text-align:center;margin-top:100px;">ACCESO DENEGADO</h1>');
}

try {
    // Configuración de la conexión a la base de datos MySQL usando PDO
    // Host: localhost, Base de datos: lol, Usuario: root, Sin contraseña
    $pdo = new PDO("mysql:host=localhost;dbname=lol;charset=utf8mb4", "root", "");
    
    // Configurar PDO para que lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si falla la conexión, terminar la ejecución y mostrar el error
    die("Error de conexión: " . $e->getMessage());
}

// Recoger los datos enviados desde el formulario
// Se usa el operador de fusión null (??) para evitar errores si el campo no existe
// trim() elimina espacios en blanco al inicio y final
$nombre   = trim($_POST['nombre']   ?? '');
$usuario  = trim($_POST['usuario']  ?? '');
$password = $_POST['password']     ?? ''; // La contraseña no se debe limpiar con trim() a veces, pero aquí se deja tal cual
$email    = trim($_POST['email']    ?? '');

// Validación: Comprobar que ningún campo esté vacío
if ($nombre === '' || $usuario === '' || $password === '' || $email === '') {
    die('<h2 style="color:#ff6b6b;text-align:center;margin-top:100px;">Todos los campos son obligatorios.</h2>');
}

// Validación: Comprobar la longitud mínima de la contraseña
if (strlen($password) < 6) {
    die('<h2 style="color:#ff6b6b;text-align:center;margin-top:100px;">La contraseña debe tener al menos 6 caracteres.</h2>');
}

// Hashing de la contraseña
// Se utiliza password_hash() con el algoritmo BCRYPT para almacenar la contraseña de forma segura
$password_hash = password_hash($password, PASSWORD_BCRYPT);

try {
    // Preparar la consulta SQL para insertar el nuevo usuario
    // Se utilizan marcadores de posición (:nombre, etc.) para prevenir inyección SQL
    $sql = "INSERT INTO usuario (nombre, usuario, password, email) 
            VALUES (:nombre, :usuario, :password, :email)";
    
    $stmt = $pdo->prepare($sql);
    
    // Ejecutar la consulta con los datos proporcionados
    $stmt->execute([
        ':nombre'   => $nombre,
        ':usuario'  => $usuario,
        ':password' => $password_hash,
        ':email'    => $email
    ]);

    // Mostrar mensaje de éxito si la inserción fue correcta
    echo "<h2 style='color:#51cf66; text-align:center; margin-top:100px;'>
            El usuario <strong>$usuario</strong> ha sido introducido en el sistema 
            con la contraseña <strong>$password</strong>.
          </h2>";
    
    // Enlace para volver al formulario de registro
    echo "<p style='text-align:center;'><a href='608resgistro.html' style='color:#c89b3c;text-decoration:none;'>Volver al registro</a></p>";

} catch (PDOException $e) {
    // Manejo de errores de la base de datos
    // El código 23000 suele indicar una violación de restricción de integridad (ej. usuario o email duplicado)
    if ($e->getCode() == 23000) {
        echo "<h2 style='color:#ff6b6b;text-align:center;margin-top:100px;'>
                Error: El usuario o email ya existe.
              </h2>";
    } else {
        // Otros errores de base de datos
        echo "<h2 style='color:red;text-align:center;'>Error: " . $e->getMessage() . "</h2>";
    }
}
?>