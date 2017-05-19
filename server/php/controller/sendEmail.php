<?php
include_once(dirname(__DIR__).'/data/usuarioCRUD.php');
include_once(dirname(__DIR__).'/data/jwt_helper.php');
require '../vendor/autoload.php';

$data = json_decode($_POST['json']);
$token = $data->token;
$token = JWT::decode($token,'9286');
//si el token es valido
if (array_key_exists("idUsuario",$token)){
  $message = file_get_contents('../../../app/emails/template.html');
  $message = str_replace('%nombre%', $data->nombre, $message);
  $message = str_replace('%nombreUsuario%', $token->nombreUsuario, $message);

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "nerdstuffmx@gmail.com";
  $mail->Password = "SuperQualifiedLemons";
  $mail->setFrom('nerdstuffmx@gmail.com', 'Nerd Stuff');
  $mail->addAddress($data->email, $data->nombre);
  $mail->Subject = '¡Haz sido invitado a formar parte de nuestras filas!';
  $mail->msgHTML($message, dirname(__FILE__));
  $mail->AddEmbeddedImage('../../../app/resources/img/imagotipoHorizontal_NerdStuff2_lq.png', 'companyLogo');
  $mail->IsHTML(true);
  $mail->AltBody = 'Nerd Stuff S.A. de C.V.';
  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Message sent!";
  }
}

 ?>
