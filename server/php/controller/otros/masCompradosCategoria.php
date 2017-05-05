<?php
include_once(dirname(__DIR__).'/model/categoria.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$categoria = new Categoria();
$categoria->setIdCategoria($obj->idCategoria);

$pcm = new ProductoCompraMetodos();
$json = $pcm->MasCompradosPorCategoria($categoria);
print_r($json);
 ?>
