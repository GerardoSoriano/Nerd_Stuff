<?php
include_once(dirname(__DIR__).'/model/compra.php');
include_once(dirname(__DIR__).'/data/compraCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$compra = new Compra();
$compra->setIdUsuario($obj->idUsuario);

$cm = new CompraMetodos();
$result = $cm->AgregarUnaCompra($compra);
if ($result == 1)
  echo "success";
 ?>
