<?php
include_once(dirname(__DIR__).'/model/domicilioEntrega.php');
include_once(dirname(__DIR__).'/data/domicilioEntregaCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$domicilioEntrega = new DomicilioEntrega();
$domicilioEntrega->setTituloDomicilio($obj->tituloDomicilio);
$domicilioEntrega->setCalle($obj->calle);
$domicilioEntrega->setNumeroDomicilio($obj->numeroDomicilio);
$domicilioEntrega->setColonia($obj->colonia);
$domicilioEntrega->setCiudad($obj->ciudad);
$domicilioEntrega->setPais($obj->pais);
$domicilioEntrega->setIdUsuario($obj->idUsuario);

$dem = new DomicilioEntregaMetodos();
$result = $dem->AgregarDomicilio($domicilioEntrega);
if ($result == 1)
  echo "success";
 ?>
