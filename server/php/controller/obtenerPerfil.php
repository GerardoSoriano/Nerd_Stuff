<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$token = $_POST['token'];
$token = JWT::decode($token,'9286');

if (array_key_exists("idUsuario",$token)) {
  $usuario = new Usuario();
  $usuario->setIdUsuario($token->idUsuario);
  $usuario = UsuarioMetodos::ObtenerDatosPersonales($usuario);
  $patrocinador = UsuarioMetodos::ObtenerMiPatrocinador($token->idUsuario);

  $return = array();
  $return['usuario'] = $usuario[0];
  $return['patrocinador'] = $patrocinador[0];

  print_r(json_encode($return));
}
?>
