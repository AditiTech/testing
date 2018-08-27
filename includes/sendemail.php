<?php
require("class.phpmailer.php");
require("class.smtp.php");

function sendemail($rcpt, $sub, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "mail.uniquefinds-online.com";
    $mail->Port = 26;
    $mail->Username = "corpus@uniquefinds-online.com";
    $mail->Password = "hwlyf4rB9F%9";
    $mail->SetFrom('corpus@uniquefinds-online.com', 'Corpus');
    $mail->IsHTML(true);
    
    $mail->AddAddress($rcpt);
    $mail->Subject  = $sub;
    $mail->Body     = $msg;
    
    if(!$mail->Send()){
        $result = 0;
        $error = $mail->ErrorInfo;
    }
    else {
        $result = 1;
    }
    return $result;
}
?>