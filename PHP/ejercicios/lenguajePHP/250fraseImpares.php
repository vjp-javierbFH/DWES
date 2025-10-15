<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Creo un formulario para pedirle al usuario que introduzca una frase -->
    <form method="get">
        <label>Introduce una frase
            <input type="text" name="frase" id="frase">
        </label>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>

<?php
// Creo una variable en la inicializo con $_GET para recibir la frase introducida por el usuario 
$cadena = $_GET['frase'];
// Variable que saca la longitud de la frase
$tamCadena = strlen($cadena);
$cadenaImpares = "";
// Recorro cada cadena de la frase
for ($i = 0; $i < $tamCadena; $i++) {
    if ($i % 2 != 0) {
        // Concatenar (.=)
        $cadenaImpares .= $cadena[$i];
    };
}

echo "Frase original: " . $cadena . "<br>";
echo "Sacando frase con los carcateres cuyas posiciones son impares: " . $cadenaImpares;
?>