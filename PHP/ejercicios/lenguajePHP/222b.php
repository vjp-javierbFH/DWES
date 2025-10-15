echo "Calcular potencia utilizando while<br>"
<?php

$base = 5;
$exponente = 3;
$potencia = 1;
$i = 1;
while ($i <= $exponente) {
    $potencia *= $base;
    $i++;
}

echo "El resultado de ".$base." elevado a la ".$exponente." es -> " .$potencia;

?>