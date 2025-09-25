<?php
$nombre = $_GET["nombre"];
$apellido1 = $_GET["apellido1"];
$apellido2 = $_GET["apellido2"];
$email = $_GET["email"];
$anyoNacimiento = $_GET["nacimiento"];
$telefono = $_GET["telefono"];

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
