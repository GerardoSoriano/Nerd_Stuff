<?php
include_once(dirname(__DIR__).'/data/productoCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$token = $_POST['token'];
$token = JWT::decode($token,'9286');
if (array_key_exists("idUsuario",$token)){
  $idCategoria = $_POST['idCategoria'];

  $productos = new Producto();
  $productos->setIdCategoria($idCategoria);
  $productos = ProductoMetodos::ProductosPorCategoria($productos);

  $return = array();
  $return['msg'] = "success";
  $return['productos'] = $productos;
  print_r($return);
}
 ?>
