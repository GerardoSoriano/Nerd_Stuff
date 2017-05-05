<?php
include_once(dirname(__DIR__).'/model/producto.php');
include_once(dirname(__DIR__).'/data/productoCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$producto = new Producto();
$producto->setIdProducto($obj->idProducto);

$pm = new ProductoMetodos;
$json = $pm->MostrarUnProducto($producto);
print_r($json);
 ?>
