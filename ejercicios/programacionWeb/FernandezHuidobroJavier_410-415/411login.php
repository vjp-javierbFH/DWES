<?php
session_start();

// Comprobar si se reciben los datos por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['paswd'] ?? '';

    // Validar usuario y contraseña (solo permite usuario/usuario)
    if ($usuario === 'usuario' && $contrasena === 'usuario') {
        $_SESSION['logueado'] = true;
        // Guardar arrays de películas y series en la sesión
        $_SESSION['peliculas'] = [
            "El niño con el pijama de rayas",
            "Spider-Man",
            "Titanic"
        ];
        $_SESSION['series'] = [
            "Breaking Bad",
            "Stranger Things",
            "La Casa de Papel"
        ];
        // Si es correcto, redirige a la vista del siguiente ejercicio (por ejemplo, 412vista.php)
        header("Location: 412peliculas.php");
        exit;
    } else {
        // Si no es correcto, redirige de nuevo al index con error
        header("Location: 410index.php?error=1");
        exit;
    }
} else {
    header("Location: 410index.php");
    exit;
}
?>