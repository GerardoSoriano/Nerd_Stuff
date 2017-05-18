<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/model/usuario.php');

$postdata = file_get_contents("php://input");
$token = json_decode($postdata);
$token = JWT::decode($token->token,'9286');
$usuarioJson = $token->usuario;

if (array_key_exists("idUsuario",$token)) {

  if (is_uploaded_file($_FILES['fotoPerfil']['tmp_name'])) //Si se subió una foto, se guarda en el server y se copia el url
  {
    $fileTmp = $_FILES['fotoPerfil']['tmp_name'];
    list($tmpPath, $fileTmpName) = explode('php', $_FILES['fotoPerfil']['tmp_name']);
    $fileName = substr($fileTmpName, 0, -3);
    list($nm, $ext) = explode('.',$_FILES['fotoPerfil']['name']);
    $fileName = $fileName.$ext;
    $address = '../../../app/resources/'.$fileName;
    if (!move_uploaded_file($fileTmp, $address)) //Se guarda el archivo en el server, avisamos en caso de falla
    {
      echo "<script>alert(\"No se pudo guardar el archivo.\");</script>";
    }
    $imageURL = $address;
  }
  $usuario = new Usuario();
  $usuario->setNombreUsuario($usuarioJson->nombreUsuario);
  $usuario->setPrimerNombre($usuarioJson->primerNombre);
  $usuario->setSegundoNombre($usuarioJson->segundoNombre);
  $usuario->setApellidoPaterno($usuarioJson->apellidoPaterno);
  $usuario->setApellidoMaterno($usuarioJson->apellidoMaterno);
  $usuario->setEmail($usuarioJson->email);
  $usuario->setContrasena($usuarioJson->contrasena);
  $usuario->setFotoUrl($imagenUrl);
  $usuario->setFormaPago($usuarioJson->formaPago);
  $usuarioInfo = UsuarioMetodos::ModificarDatosPersonales($usuario);
  print_r($usuarioInfo);
}
?>
