<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setIdUsuario($obj->idUsuario);

$pcm = new ProductoCompraMetodos();
$json = $pcm->ComprasPorUsuario($usuario);
print_r($json);
 ?>
