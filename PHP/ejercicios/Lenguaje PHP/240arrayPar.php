<?php
function esPar($numero):bool {
    return $numero % 2 == 0;
}

function arrayAleatorios(int $tam, int $min, int $max){
    $array = [];
    for ($i=0; $i < $tam; $i++){
        $array[] = rand($min,$max);
    }
    return $array;
}

function arrayPares(array &$array):int {
    $contador=0;
    foreach($array as $valor){
        if(esPar($valor)){
            $contador++;
        }
    }
    return $contador;
}

$generarArray = arrayAleatorios(10,1,2);
echo "Array generado: " .print_r($generarArray);
echo "Números pares generados: " .arrayPares($generarArray);
?>