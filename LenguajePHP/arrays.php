<?php

echo "Ejemplo de array". "<br>";

$vector = array("Manzana", "Banana", "Cereza");
print_r($vector);
echo "<br>";
$vector2 = ["Rojo", "Verde", "Azul"];

$vector3 = [];
$vector3[0] = "Perro";
$vector3[1] = "Gato";
$vector3[] = "Pájaro";

echo $vector[1]. "<br>"; // Imprime "Banana"
echo $vector2[0]. "<br>"; // Imprime "Rojo"
echo $vector3[2]; // Imprime "Pájaro"

echo "<p> Arrays bidimensionales </p>";

?>