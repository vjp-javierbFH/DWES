<!-- Escribe un programa que muestre los números pares del 0 al 50 (dentro de una ulsta desordenada) -->
<?php 

echo $numeros = 0;
while ($numeros <= 50) {
    if ($numeros % 2 == 0) {
        echo "<ul>" . $numeros . "</ul>";
    }
    $numeros++;
}

?>