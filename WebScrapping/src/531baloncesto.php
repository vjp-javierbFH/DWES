<?php
require '../vendor/autoload.php';

$httpClient = new \Goutte\Client();
$response = $httpClient->request('GET', "https://www.seleccionbaloncesto.es/inicio.aspx");

$alturas = []; 
$response->filter('table#_ctl1_plantillaListView_contenedor.tabla-dataGrid tbody tr[id^="_Tr1"] td[id^="_alturaTd"]')->each(
    function ($node) use (&$alturas){
        $alturas[] = trim($node->text());
    }
);