<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $nombre = "Javier";
    $apellido1 = "Fernández";
    $apellido2 = "Huidobro";
    $email = "jbfernandezh01@iesvjp.es";
    $anyoNacimiento = 2005;
    $telefono = "123456789";
    echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <td>$nombre</td>
            </tr>
            <tr>
                <th>Primer Apellido</th>
                <td>$apellido1</td>
            </tr>
            <tr>
                <th>Segundo Apellido</th>
                <td>$apellido2</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>$email</td>
            </tr>  
            <tr>
                <th>Año de Nacimiento</th>
                <td>$anyoNacimiento</td>   
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>$telefono</td>
            </tr>  
        
            
          </table>";
    ?>
</body>

</html>