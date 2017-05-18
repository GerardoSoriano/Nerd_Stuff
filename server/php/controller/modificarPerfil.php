<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

//obtenemos el token
$token = $_POST["token"];
$token = JWT::decode($token,'9286');
//si el token es valido
if (array_key_exists("idUsuario",$token)){
  //variable para manejo de errores
  $return = array();
  //todo lo correspondiente a la info del usuario
  $usuario = new Usuario();
  $usuario->setIdUsuario($token->idUsuario);
  $usuario->setNombreUsuario($token->nombreUsuario);
  //obtenemos un backup del usuario
  $backup = UsuarioMetodos::ObtenerDatosPersonales($usuario);
  if (isset($_POST['jsonDatos'])) {
    $json = json_decode($_POST['jsonDatos']);

    $usuario->setPrimerNombre($json->primerNombre);
    $usuario->setSegundoNombre($json->segundoNombre);
    $usuario->setApellidoPaterno($json->apellidoPaterno);
    $usuario->setApellidoMaterno($json->apellidoMaterno);
    $usuario->setEmail($json->email);
    $usuario->setContrasena($json->contrasena);
  }else {
    $usuario->setNombreUsuario($backup[0]['nombreUsuario']);
    $usuario->setPrimerNombre($backup[0]['primerNombre']);
    $usuario->setSegundoNombre($backup[0]['segundoNombre']);
    $usuario->setApellidoPaterno($backup[0]['apellidoPaterno']);
    $usuario->setApellidoMaterno($backup[0]['apellidoMaterno']);
    $usuario->setEmail($backup[0]['email']);
    $usuario->setContrasena($backup[0]['contrasena']);
  }
  //todo lo correspondiente a la imagen
  if(isset($_FILES['image'])){
    $errors= array();

    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions )=== false){
      $errors['errorExtension'] = 'La imagen que se envio no es un JPG o un PNG';
    }

    if($file_size > 2097152){
      $errors['errorTamaño'] = 'La imagen pesa mas de 2MB';
    }

    if(empty($errors)==true){
      move_uploaded_file($file_tmp,'../../../app/resources/img/'.$file_name);
      $return['imagen'] = 'La imagen fue subida exitosamente';
      $usuario->setFotoUrl($file_name);
    }else{
      $return['imagen'] = $errors;
      $usuario->setFotoUrl($backup[0]['fotoUrl']);
    }
  }else{
    $return['imagen'] = 'No se encontro ninguna imagen';
    $usuario->setFotoUrl($backup[0]['fotoUrl']);
  }

  $sp = UsuarioMetodos::ModificarDatosPersonales($usuario);

  $return['mysqlDatos'] = $sp;

  print_r(json_encode($return));
}
?>
