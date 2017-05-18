<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/model/usuario.php');

// $postdata = file_get_contents("php://input");
// $token = json_decode($postdata);
// $token = JWT::decode($token->token,'9286');
// $usuarioJson = $token->usuario;


$fname = $_POST["nombre"];
$token = $_POST["token"];

if(isset($_FILES['image'])){
    //The error validation could be done on the javascript client side.
    $errors= array();        
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $extensions = array("jpeg","jpg","png");        
    if(in_array($file_ext,$extensions )=== false){
     $errors[]="image extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 2097152){
    $errors[]='File size cannot exceed 2 MB';
    }               
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"../../../app/resources/img/".$file_name);
        echo "TEST uploaded file: " . "images/" . $file_name;
    }else{
        print_r($errors);
    }
}
else{
  echo "No se obtuvo imagen";
}


// if (array_key_exists("idUsuario",$token)) {

//   if (is_uploaded_file($_FILES['fotoPerfil']['tmp_name']))
//   {
//     $fileTmp = $_FILES['fotoPerfil']['tmp_name'];
//     list($tmpPath, $fileTmpName) = explode('php', $_FILES['fotoPerfil']['tmp_name']);
//     $fileName = substr($fileTmpName, 0, -3);
//     list($nm, $ext) = explode('.',$_FILES['fotoPerfil']['name']);
//     $fileName = $fileName.$ext;
//     $address = '../../../app/resources/'.$fileName;
//     if (!move_uploaded_file($fileTmp, $address)) 
//     {
//       echo "<script>alert(\"No se pudo guardar el archivo.\");</script>";
//     }
//     $imageURL = $address;
//   }
//   $usuario = new Usuario();
//   $usuario->setNombreUsuario($usuarioJson->nombreUsuario);
//   $usuario->setPrimerNombre($usuarioJson->primerNombre);
//   $usuario->setSegundoNombre($usuarioJson->segundoNombre);
//   $usuario->setApellidoPaterno($usuarioJson->apellidoPaterno);
//   $usuario->setApellidoMaterno($usuarioJson->apellidoMaterno);
//   $usuario->setEmail($usuarioJson->email);
//   $usuario->setContrasena($usuarioJson->contrasena);
//   $usuario->setFotoUrl($imagenUrl);
//   $usuario->setFormaPago($usuarioJson->formaPago);
//   $usuarioInfo = UsuarioMetodos::ModificarDatosPersonales($usuario);
//   print_r($usuarioInfo);
// }
// 
?>