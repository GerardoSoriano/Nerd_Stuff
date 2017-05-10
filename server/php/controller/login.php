<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setEmail($obj->email);
$usuario->setContrasena($obj->contrasena);

$um = new UsuarioMetodos();
$json = $um->LoginUsuario($usuario);

$json = json_decode($json);

$token = array();
$token['idUsuario'] =  $json[0]->idUsuario;
$token['nombreUsuario'] = $json[0]->nombreUsuario;
$token = JWT::encode($token, '9286');

unset($json[0]->idUsuario);
unset($json[0]->contrasena);

$return = array();
$return['msg'] = "success";
$return['usuario'] = $json[0];
$return['token'] = $token;
print_r(json_encode($return));
 ?>
