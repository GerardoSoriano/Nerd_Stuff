<?php
include_once(dirname(__DIR__).'./../model/usuario.php');
include_once(dirname(__DIR__).'./../data/usuarioCRUD.php');

//$json = $_POST['json'];
//$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setIdUsuario(2);//$obj->idUsuario);

$um = new UsuarioMetodos();
$obj1 = $um->ObtenerMiPatrocinador($usuario->getIdUsuario());
$obj2 = $um->ObtenerDatosPersonalesArbol($usuario->getIdUsuario());
$obj3 = $um->ObtenerMisInvitados($usuario->getIdUsuario());
$obj = array();
$obj2[0]['invitados'] = $obj3;
if (!$obj1 == null) {
  $obj1[0]['invitados'] = $obj2;
}
else {
  $obj1 = $obj2;
}
$obj['invitados'] = $obj1;
print_r(json_encode($obj));
 ?>
