<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');

$string = json_decode(file_get_contents(dirname(__DIR__).'/../json/users_generated.json'));
foreach ($string as $key => $value) {
  $usuario = new Usuario();
  $usuario->setNombreUsuario($value->nombreUsuario);
  $usuario->setPrimerNombre($value->primerNombre);
  $usuario->setSegundoNombre($value->segundoNombre);
  $usuario->setApellidoPaterno($value->apellidoPaterno);
  $usuario->setApellidoMaterno($value->apellidoMaterno);
  $usuario->setEmail($value->email);
  $usuario->setContrasena($value->contrasena);
  $usuario->setFechaNacimiento($value->fechaNacimiento);
  $usuario->setGenero($value->genero);
  $usuario->setFormaPago($value->formaPago);
  $usuario->setFechaRegistro($value->fechaRegistro);
  $usuario->setIdPatrocinador($value->idPatrocinador);

  $um = new UsuarioMetodos();
  $result = $um->AgregarUsuario($usuario);
  echo "usuario ".$usuario->getNombreUsuario()." agregado<br>";
}
 ?>
