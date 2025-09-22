echo "A partir de una base y exponente, mediante la acumulación de productos, calcula la potencia utilizando la instrucción for.<br>";
<?php 

$base = 5;
$exponente = 3;

$potencia = 1;
for ($i = 1; $i <= $exponente; $i++) {
    $potencia *= $base;
}

echo "El resultado de ".$base." elevado a la ".$exponente." es -> " .$potencia;

?>