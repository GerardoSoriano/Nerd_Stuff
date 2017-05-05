<?php
include_once(dirname(__DIR__).'/model/productoCompra.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$productoCompra = new ProductoCompra();
$productoCompra->setIdCompra($obj->idCompra);
$productoCompra->setIdProducto($obj->idProducto);

$pcm = new ProductoCompraMetodos();
$json = $pcm->ProductoComprado($productoCompra);
print_r($json);
 ?>
