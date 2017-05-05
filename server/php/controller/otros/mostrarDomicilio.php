<?php
include_once(dirname(__DIR__).'/model/domicilioEntrega.php');
include_once(dirname(__DIR__).'/data/domicilioEntregaCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$domicilioEntrega = new DomicilioEntrega();
$domicilioEntrega->setIdUsuario($obj->idUsuario);

$dem = new DomicilioEntregaMetodos();
$json = $dem->MostrarDomicilios($domicilioEntrega);
print_r($json);
 ?>
