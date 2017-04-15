<?php
include_once(dirname(__DIR__).'/data/domicilioEntregaCRUD.php');

$string = json_decode(file_get_contents(dirname(__DIR__).'/../json/address_generated.json'));
foreach ($string as $key => $value) {
  $domicilioEntrega = new DomicilioEntrega();
  $domicilioEntrega->setTituloDomicilio($value->tituloDomicilio);
  $domicilioEntrega->setCalle($value->calle);
  $domicilioEntrega->setNumeroDomicilio($value->numeroDomicilio);
  $domicilioEntrega->setColonia($value->colonia);
  $domicilioEntrega->setCiudad($value->ciudad);
  $domicilioEntrega->setEstado($value->estado);
  $domicilioEntrega->setCodigoPostal(1233);
  $domicilioEntrega->setPais($value->pais);
  $domicilioEntrega->setIdUsuario($value->idUsuario);

  $dem = new DomicilioEntregaMetodos();
  $result = $dem->AgregarDomicilio($domicilioEntrega);
  echo "domicilio ".$domicilioEntrega->getTituloDomicilio()." agregado<br>";
}
 ?>
