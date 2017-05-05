<?php
include_once(dirname(__DIR__).'/model/descuento.php');
include_once(dirname(__DIR__).'/data/descuentoCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$descuento = new Descuento();
$descuento->setFechaInicio($obj->fechaInicio);
$descuento->setIdProducto($obj->idProducto);

$dm = new DescuentoMetodos();
$json = $dm->ObtenerOfertas();
print_r($json);
 ?>
