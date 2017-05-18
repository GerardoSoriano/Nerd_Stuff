<?php
include_once(dirname(__DIR__).'./../model/usuario.php');
include_once(dirname(__DIR__).'./../data/usuarioCRUD.php');
include_once(dirname(__DIR__).'./../data/jwt_helper.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');

if (array_key_exists("idUsuario",$token)) {
  
  $idUsuario = $token->idUsuario;

  $um = new UsuarioMetodos();
  $obj1 = $um->ObtenerMiPatrocinador($idUsuario);
  $obj2 = $um->ObtenerDatosPersonalesArbol($idUsuario);
  $obj3 = $um->ObtenerMisInvitados($idUsuario);
  $obj = array();
  $obj2[0]['invitados'] = $obj3;
  
  if (!$obj1 == null) {
    $obj1[0]['invitados'] = $obj2;  
  } else {
    $obj1 = $obj2;
  }
  
  $obj['invitados'] = $obj1;
  print_r(json_encode($obj));
}

?>
