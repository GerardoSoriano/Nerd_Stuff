<?php
include_once(dirname(__DIR__).'/model/descuento.php');
include_once(dirname(__DIR__).'/data/descuentoCRUD.php');

$dm = new DescuentoMetodos();
$json = $dm->ObtenerOfertas();
print_r($json);
 ?>
