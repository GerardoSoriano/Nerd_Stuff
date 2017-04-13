<?php
include_once(dirname(__DIR__).'/model/producto.php');
include_once(dirname(__DIR__).'/data/productoCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$producto = new Producto();
$producto->setIdCategoria($obj->idCategoria);

$pm = new ProductoMetodos;
$json = $pm->ProductosPorCategoria($producto);
print_r($json);
 ?>
