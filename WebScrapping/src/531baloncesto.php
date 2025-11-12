<?php
require '../vendor/autoload.php';

$httpClient = new \Goutte\Client();
$response = $httpClient->request('GET', "https://www.seleccionbaloncesto.es/inicio.aspx");

$alturas = []; 
// CAMBIO MÍNIMO: selector genérico que sí existe
$response->filter('table tbody tr')->each(function ($row) use (&$alturas) {
    $cells = $row->filter('td')->extract(['_text']);
    if (count($cells) >= 3) {
        $altura = trim($cells[2] ?? ''); // altura suele estar en la 3ª columna
        if (preg_match('/\d[,.]\d{2}/', $altura)) {
            $alturas[] = $altura;
        }
    }
});

// Mostrar alturas
print_r($alturas);