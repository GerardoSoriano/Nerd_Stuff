<?php
include_once(dirname(__DIR__).'/data/compraCRUD.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$json = json_decode($_POST['json']);
$token = JWT::decode($json->token,'9286');

if (array_key_exists("idUsuario",$token)){
  $compra = new Compra();
  $compra->setIdUsuario($token->idUsuario);
  $compra = CompraMetodos::AgregarUnaCompra($compra);

  $productoComprado = new ProductoCompra();
  $productoComprado->setidCompra($compra[0]['idCompra']);
  foreach ($json->productos as $key => $value) {
    $productoComprado->setIdProducto($value->idProducto);

    ProductoCompraMetodos::ProductoComprado($productoComprado);
  }
  print_r("success");
}

 ?>
