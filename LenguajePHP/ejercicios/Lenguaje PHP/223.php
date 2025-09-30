<!-- Muestra dentro de una tabla HTML la tabla de multiplicar del numero que reciba como parámetro. -->

<?php
$numero = $_GET ["numero"];
echo "<table border='1'>";
echo "<thead>
    <tr>
        <th>Número 1</th>
        <th> Operando </th>
        <th>Número 2</th>
        <th>resultado</th>
    </tr>
</thead>";
echo "<tbody>";
for($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "<tr>
        <td>$numero</td>
        <td> x </td>
        <td>$i</td>
        <td>$resultado</td>
    </tr>";
}
echo "</tbody>";
echo "</table>";
?>