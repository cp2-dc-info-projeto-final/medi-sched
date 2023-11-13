<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:/Program Files (x86)/EasyPHP-Devserver-17/eds-www/PHPMailer-master/src/Exception.php';
require 'C:/Program Files (x86)/EasyPHP-Devserver-17/eds-www/PHPMailer-master/src/PHPMailer.php';
require 'C:/Program Files (x86)/EasyPHP-Devserver-17/eds-www/PHPMailer-master/src/SMTP.php';

function envia_email($para, $assunto, $mensagem){
    $mail = new PHPMailer(true);}

    try {
    
        $mail->isSMTP();                                        
        $mail->Host       = 'smtp.gmail.com';        
        $mail->SMTPAuth   = true;                                 
        $mail->Username   = 'agendasaude1@gmail.com';    
        $mail->Password   = '';         
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       
        $mail->Port       = 587;                                   
        $mail->setFrom('agendasaude1@gmail.com', utf8_decode('Agenda+Saúde'));
        $mail->addAddress($para);                                  
        $mail->isHTML(true);                                
        $mail->Subject = $assunto;                          
        $mail->Body    = $mensagem;             
        $mail->send();                                       
        return true;                                        
    } catch (Exception $e) {
        echo "Erro: ".$e;
        return false;           
    }
}
?>
