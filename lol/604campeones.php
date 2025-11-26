
<?php
// Listar todos los campeones de LOL que he metido en mi bases de datos.
// Campeones de LoL

// Hago conexión con la base de datos.
$conexion = mysqli_connect("localhost", "root", "", "lol");

// Compruebo la conexión.
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Hago la consulta.
$sql = "SELECT * FROM campeon";
$result = $conexion->query($sql);

// Muestro los resultados.
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Rol: " . $row["rol"] . "<br>";
        echo "Dificultad: " . $row["dificultad"] . "<br>";
        echo "Descripcion: " . $row["descripcion"] . "<br>";
        echo "------------------------<br>";
    }
} else {
    echo "0 resultados";
}

// Cierro la conexión.
$conexion->close();