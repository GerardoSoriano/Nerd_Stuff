<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setNombreUsuario($obj->nombreUsuario);
$usuario->setPrimerNombre($obj->primerNombre);
$usuario->setSegundoNombre($obj->segundoNombre);
$usuario->setApellidoPaterno($obj->apellidoPaterno);
$usuario->setApellidoMaterno($obj->apellidoMaterno);
$usuario->setEmail($obj->email);
$usuario->setContrasena(md5($obj->contrasena));
$usuario->setFechaNacimiento($obj->fechaNacimiento);
$usuario->setGenero($obj->genero);
$usuario->setFormaPago($obj->formaPago);
$usuario->setIdPatrocinador($obj->idPatrocinador);

$um = new UsuarioMetodos();
$result = $um->ModificarDatosPersonales($usuario);
if ($result == 1)
  echo "success";
 ?>
