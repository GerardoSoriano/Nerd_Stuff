<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setIdUsuario($obj->idUsuario);

$um = new UsuarioMetodos();
$json = $um->ObtenerDatosPersonales($usuario);
print_r($json);
 ?>
