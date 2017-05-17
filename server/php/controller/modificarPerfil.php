<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/model/usuario.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');
$usuarioJson = $token->usuario;

if (array_key_exists("idUsuario",$token)) {
  $usuario = new Usuario();
  $usuario->getNombreUsuario($usuarioJson->nombreUsuario);
  $usuario->getPrimerNombre($usuarioJson->primerNombre);
  $usuario->getSegundoNombre($usuarioJson->segundoNombre);
  $usuario->getApellidoPaterno($usuarioJson->apellidoPaterno);
  $usuario->getApellidoMaterno($usuarioJson->apellidoMaterno);
  $usuario->getEmail($usuarioJson->email);
  $usuario->getContrasena($usuarioJson->contrasena);
  $usuario->getFormaPago($usuarioJson->formaPago);
  $usuarioInfo = UsuarioMetodos::ModificarDatosPersonales($usuario);
  print_r($usuarioInfo);
}
?>
