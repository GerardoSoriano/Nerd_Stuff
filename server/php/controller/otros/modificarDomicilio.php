<?php
include_once(dirname(__DIR__).'/model/domicilioEntrega.php');
include_once(dirname(__DIR__).'/data/domicilioEntregaCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$domicilioEntrega = new DomicilioEntrega();
$domicilioEntrega->setIdDomicilio($obj->idDomicilio);
$domicilioEntrega->setTituloDomicilio($obj->tituloDomicilio);
$domicilioEntrega->setCalle($obj->calle);
$domicilioEntrega->setNumeroDomicilio($obj->numeroDomicilio);
$domicilioEntrega->setColonia($obj->colonia);
$domicilioEntrega->setCiudad($obj->ciudad);
$domicilioEntrega->setEstado($obj->estado);
$domicilioEntrega->setCodigoPostal($obj->codigoPostal);
$domicilioEntrega->setPais($obj->pais);
$domicilioEntrega->setIdUsuario($obj->idUsuario);

$dem = new DomicilioEntregaMetodos();
$result = $dem->ModificarDomicilio($domicilioEntrega);
if ($result == 1)
  echo "success";
 ?>
