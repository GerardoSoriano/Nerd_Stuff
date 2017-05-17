<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');

if (array_key_exists("idUsuario",$token)) {
  $usuarioInfo = UsuarioMetodos::ObtenerDatosPersonales(token->idUsuario);
  print_r($usuarioInfo);
}
?>
