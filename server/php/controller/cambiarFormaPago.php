<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setNombreUsuario($obj->nombreUsuario);
$usuario->setFormaPago($obj->formaPago);

$um = new UsuarioMetodos();
$result = $um->CambiarFormaDePago($usuario);
if ($result == 1)
  echo "success";
 ?>
