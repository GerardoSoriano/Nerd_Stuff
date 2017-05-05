<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setIdUsuario($obj->idUsuario);
$fechaInicio = $obj->fechaInicio;
$fechaFinal = $obj->fechaFinal;

$pcm = new ProductoCompraMetodos();
$json = $pcm->ComprasPorRangoDeFechas($usuario,$fechaInicio,$fechaFinal);
print_r($json);
 ?>
