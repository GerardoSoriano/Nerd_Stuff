<?php
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');

$pcm = new ProductoCompraMetodos();
$json = $pcm->MasComprados();
print_r($json);
 ?>
