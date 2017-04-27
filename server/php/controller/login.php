<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setEmail($obj->email);
$usuario->setContrasena(md5($obj->contrasena));

$um = new UsuarioMetodos();
$json = $um->LoginUsuario($usuario);

$json = json_decode($json);
$token = array();
$token['id'] =  $json[0]->idUsuario;
$testToken = JWT::encode($token, '31213');

print_r(JWT::decode($testToken, '31213'));
 ?>
