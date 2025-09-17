<?php

// Ejemplo de array

$vector = array("Manzana", "Banana", "Cereza");

$vector2 = ["Rojo", "Verde", "Azul"];

$vector3 = [];
$vector3[0] = "Perro";
$vector3[1] = "Gato";
$vector3[] = "Pájaro";

echo $vector[1]; // Imprime "Banana"
echo $vector2[0]; // Imprime "Rojo"
echo $vector3[2]; // Imprime "Pájaro"

?>