<?php

namespace mechacron;

use jin\mail\MailSender;

class MechaCronException extends \Exception{
    
    const CRITICAL_SECURE_CLIREQUIRED = '1001001';
    const CRITICAL_SHUTDOWN_UNKNOWN = '1002001';
    
    public function __construct($message, $code) {
        parent::__construct($message, $code);
        
        if(EXCEPTIONS_SENDEMAIL){
            $this->sendByMail();
        }
    }
    
    private function sendByMail(){
        $mail = new MailSender();
        $mail->addDestinataire(ADMINISTRATOR_EMAIL);
        $mail->setExpediteur(FROM_EMAIL);
        $mail->setSujet(APPZ_NAME.' > une erreur a été rencontrée');
        $content = '<b>Une erreur a été rencontrée : </b><br>';
        $date = new \DateTime();
        $content .= '<b>Date : </b>'.$date->format('d/m/Y H:i:s').'<br>';
        $content .= '<b>Code : </b>'.parent::getMessage().'<br>';
        $content .= '<b>Fichier : </b>'.parent::getFile().'<br>';
        $content .= '<b>Ligne : </b>'.parent::getLine().'<br>';
        $content .= '<b>Message : </b>'.parent::getMessage().'<br><br>';
        $content .= '<b>StackTrace : </b><br>'.parent::getTraceAsString();
        
        $mail->setMessage($content);
        
        $mail->send();
    }
    
}
