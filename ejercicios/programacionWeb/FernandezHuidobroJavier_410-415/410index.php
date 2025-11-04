<?php
// Validar el inicio de sesión
if(isset($_POST['enviar'])){
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['paswd'] ?? '';

    // Validar usuario y contraseña (solo permite usuario/usuario)
    if ($usuario === 'usuario' && $contrasena === 'usuario') {
        // Si es correcto, redirige a la vista del siguiente ejercicio (por ejemplo, 412vista.php)
        header("Location: 412peliculas.php");
        exit;
    } else {
        echo "<h3>Usuario o contraseña incorrectos</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body {
            background-color: rgb(192, 188, 188);
            text-align: center;
        }
        h3 {
            color: red;
        }
    </style>
</head>

<body>
    <!-- Formulario -->
    <div class="formulario">
        <h2>Inicio de sesión</h2>
        <form action="411login.php" method="post">
            <fieldset>
                <div class="usuario">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario">
                </div>
                <br>
                <div class="contrasena">
                    <label for="paswd">Contraseña</label>
                    <input type="password" name="paswd" id="paswd" placeholder="Ingrese su contraseña">
                </div>
                <br>
                <input type="submit" name="iniciar" value="Iniciar sesión">
            </fieldset>
        </form>
    </div>
</body>

</html>