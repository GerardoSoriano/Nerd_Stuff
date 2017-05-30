<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$data = json_decode($_POST['json']);
$token = $data->token;
$token = JWT::decode($token,'9286');

if (array_key_exists("idUsuario",$token)){    
  $emailto = $data->email;
  $toname = $data->nombre;
  $emailfrom = 'no-reply@nerdstuff.com.mx';
  $fromname = 'Nerd Stuff S.A. de C.V.';
  $subject = 'Haz sido invitado a formar parte de nuestras filas!';

  $messagebody = file_get_contents('../../../app/emails/template.html');
  $messagebody = str_replace('%nombre%', $data->nombre, $messagebody);
  $messagebody = str_replace('%nombreUsuario%', $token->nombreUsuario, $messagebody);
  $headers = 
              'Return-Path: ' . $emailfrom . "\r\n" . 
              'From: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" . 
              'X-Priority: 3' . "\r\n" . 
              'X-Mailer: PHP ' . phpversion() .  "\r\n" . 
              'Reply-To: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" .
              'MIME-Version: 1.0' . "\r\n" . 
              'Content-Transfer-Encoding: 8bit' . "\r\n" . 
              'Content-Type: text/html; charset=UTF-8' . "\r\n";
  $params = '-f ' . $emailfrom;
  mail($emailto, $subject, $messagebody, $headers, $params);
} else {
  echo "El usuario no tiene un token valido";
}

?>