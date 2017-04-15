<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setIdUsuario($obj->idUsuario);
$fecha = $obj->fecha;

$pcm = new ProductoCompraMetodos();
$json = $pcm->ComprasPorMes($usuario,$fecha);
print_r($json);
 ?>
