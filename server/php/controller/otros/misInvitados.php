<?php
include_once(dirname(__DIR__).'./../model/usuario.php');
include_once(dirname(__DIR__).'./../data/usuarioCRUD.php');

//$json = $_POST['json'];
//$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setIdUsuario(2);//$obj->idUsuario);

$um = new UsuarioMetodos();
$obj1 = $um->ObtenerMiPatrocinador($usuario->getIdUsuario());
$obj2 = $um->ObtenerMisInvitados($usuario->getIdUsuario());
$obj = array();
$obj['patrocinador'] = $obj1;
$obj['invitados'] = $obj2;
print_r(json_encode($obj));
 ?>
