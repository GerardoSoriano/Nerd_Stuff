<?php
require '../vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "gerardosoriano97@gmail.com";
$mail->Password = "jgsoriano";
$mail->setFrom('gerardosoriano97@gmail.com', 'Gerardo Soriano');
$mail->addAddress('gerardosoriano97@gmail.com', 'Juan Soto');
$mail->Subject = 'Test para mandar correo con formato';
$mail->msgHTML(file_get_contents('../../../app/emails/template.html'), dirname(__FILE__));
$mail->AddEmbeddedImage('../../../app/resources/img/imagotipoHorizontal_NerdStuff2_lq.png', 'companyLogo');
$mail->IsHTML(true);
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
 ?>
