<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setNombreUsuario($obj->nombreUsuario);
$usuario->setPrimerNombre($obj->primerNombre);
$usuario->setApellidoPaterno($obj->apellidoPaterno);
$usuario->setEmail($obj->email);
$usuario->setContrasena(md5($obj->contrasena));

$um = new UsuarioMetodos();
$result = $um->RegistrarUsuario($usuario);
if ($result == 1)
  echo "success";
 ?>
