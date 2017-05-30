<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');

$data = json_decode($_POST['json']);
$token = $data->token;
$token = JWT::decode($token,'9286');
$response = new \stdClass();

if (array_key_exists("idUsuario",$token)){
  $emailto = $data->email;
  $toname = $data->nombre;
  $emailfrom = 'no-reply@nerdstuff.com.mx';
  $fromname = 'Nerd Stuff S.A. de C.V.';
  $subject = 'Has sido invitado a formar parte de nuestras filas!';

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
  $sended = mail($emailto, $subject, $messagebody, $headers, $params);

  if($sended == 1)
  {
    $response->msg = "Success";
  }
  else
  {
    $response->msg = "Ocurrió un error inesperado";
  }

  echo json_encode($response);
}
else
{
  $response->msg ="El usuario no tiene un token valido";

  echo json_encode($response);
}

?>
