<?php
include_once(dirname(__DIR__).'/data/productoCRUD.php');
include_once(dirname(__DIR__).'/data/descuentoCRUD.php');
include_once(dirname(__DIR__).'/data/favoritosCRUD.php');
include_once(dirname(__DIR__).'/data/productoCompraCRUD.php');
include_once(dirname(__DIR__).'/data/categoriaCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');

if (array_key_exists("idUsuario",$token)) {
  //Obetenemos las categorias
  $categorias = CategoriaMetodos::ObtenerCategorias();
  //Obetenemos las ofertas
  $ofertas = DescuentoMetodos::ObtenerOfertas();
  //Obtenemos los favoritos en base a un ID
  $favoritos = new Favoritos();
  $favoritos->setIdUsuario($token->idUsuario);
  $favoritos = FavoritosMetodos::MostrarFavoritos($favoritos);
  //Obtenemos las ultimas compras en base a un ID
  $ultimasCompras = new Usuario();
  $ultimasCompras->setIdUsuario($token->idUsuario);
  $ultimasCompras = ProductoCompraMetodos::UltimasCompras($ultimasCompras);
  //Generamos el json final
  $return = array();
  $return['msg'] = "success";
  $return['categorias'] = $categorias;
  $return['ofertas'] = $ofertas;
  $return['favoritos'] = $favoritos;
  $return['ultimasCompras'] = $ultimasCompras;
  print_r(json_encode($return));
}
 ?>
