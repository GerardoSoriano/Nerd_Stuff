<?php
include_once(dirname(__DIR__).'/model/domicilioEntrega.php');
include_once(dirname(__DIR__).'/data/domicilioEntregaCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$domicilioEntrega = new DomicilioEntrega();
$domicilioEntrega->setIdDomicilio($obj->idDomicilio);
$domicilioEntrega->setIdUsuario($obj->idUsuario);

$dem = new DomicilioEntregaMetodos();
$json = $dem->ObtenerUnDomicilio($domicilioEntrega);
print_r($json);
 ?>
