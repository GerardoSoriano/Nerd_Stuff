<?php
include_once(dirname(__DIR__).'./../data/productoCompraCRUD.php');
include_once(dirname(__DIR__).'./../data/categoriaCRUD.php');
include_once(dirname(__DIR__).'./../data/jwt_helper.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');

if (array_key_exists("idUsuario", $token)){
    $idUsuario = $token->idUsuario;    
    $pcm = new ProductoCompraMetodos();
    $json = $pcm->ComprasPorUsuario($idUsuario);
    print_r(json_encode($json));
}
?>