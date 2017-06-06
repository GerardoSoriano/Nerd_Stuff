<?php
include_once(dirname(__DIR__).'/model/usuario.php');
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$json = $_POST['json'];
$obj = json_decode($json);

$usuario = new Usuario();
$usuario->setNombreUsuario($obj->nombreUsuario);
$usuario->setPrimerNombre($obj->primerNombre);
$usuario->setApellidoPaterno($obj->apellidoPaterno);
$usuario->setEmail($obj->email);
$usuario->setContrasena(md5($obj->contrasena));

$um = new UsuarioMetodos();
$result = $um->AgregarUsuario($usuario);
$return = array();

if ($result == true){      
    $json = $um->LoginUsuario($usuario);
    $json = json_decode($json);

    $token = array();
    $token['idUsuario'] =  $json[0]->idUsuario;
    $token['nombreUsuario'] = $json[0]->nombreUsuario;
    $token = JWT::encode($token, '9286');

    unset($json[0]->idUsuario);
    unset($json[0]->contrasena);

    $return['msg'] = "success";
    $return['usuario'] = $json[0];
    $return['token'] = $token;
} else {
    $return['msg'] = "No se pudo registrar en la BD";
    $return['usuario'] = null;
    $return['token'] = null;
}
print_r(json_encode($return));

?>
