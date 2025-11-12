<?php
require '../vendor/autoload.php';

$httpClient = new \Goutte\Client();
$response = $httpClient->request('GET', "https://www.seleccionbaloncesto.es/inicio.aspx");

$response->filter('table#_ctl1_plantillaListView_contenedor.tabla-dataGrid tbody tr  td#_ctl1_plantillaListView_ctrl3_alturaTd')->each(
    function ($node) use (&$alturas){
        $alturas[] = $node->text();
    }
);