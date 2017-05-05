<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setNombreUsuario($obj->nombreUsuario);
$usuario->setContrasena(md5($obj->contrasena));
$contrasenaNueva = md5($obj->contrasenaNueva);

$um = new UsuarioMetodos();
$result = $um->ModificarContrasena($usuario,$contrasenaNueva);
if ($result == 1)
  echo "success";
 ?>
