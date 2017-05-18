<?php
include_once(dirname(__DIR__).'/data/productoCRUD.php');
include_once(dirname(__DIR__).'/data/categoriaCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');

if (array_key_exists("idUsuario", $token)){
  $return = array();
  $categorias = CategoriaMetodos::ObtenerCategorias();
  foreach ($categorias as $key => $value) {
    $productos = new Producto();
    $productos->setIdCategoria($value['idCategoria']);

    $productos = ProductoMetodos::ProductosPorCategoria($productos);
    $return[$key]['productos'] = $productos;
    $return[$key]['nombreCategoria'] = $value['nombreCategoria'];
  }
  print_r(json_encode($return));
}
 ?>
