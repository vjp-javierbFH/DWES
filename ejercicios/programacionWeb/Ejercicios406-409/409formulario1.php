<?php
// 409formulario1.php - Paso 1: Datos personales
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario 1/3 - Datos Personales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f7f9;
        }

        .container {
            max-width: 600px;
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

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"],
        input[type="email"],
        input[type="url"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        .radio-group {
            margin: 10px 0;
        }

        .radio-group label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
        }

        input[type="submit"] {
            margin-top: 25px;
            padding: 12px 30px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #2980b9;
        }

        .error {
            color: #e74c3c;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Paso 1 de 3: Datos Personales</h1>
        <form action="409formulario2.php" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>URL Personal:</label>
            <input type="url" name="url" placeholder="https://ejemplo.com" required>

            <label>Sexo:</label>
            <div class="radio-group">
                <label><input type="radio" name="sexo" value="hombre" required> Hombre</label>
                <label><input type="radio" name="sexo" value="mujer"> Mujer</label>
                <label><input type="radio" name="sexo" value="otro"> Otro</label>
            </div>

            <input type="submit" value="Siguiente">
        </form>
    </div>
</body>

</html>