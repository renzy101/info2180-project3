<?php
session_start();

if(isset($_SESSION['user'])){
    require 'models/messaging.model.php';
    
    $messagingMOD = new MessagingModel();
    $messages = $messagingMOD->recents($_SESSION['user']);
    
    if($messages){
        $response = '<?xml version="1.0"  encoding="UTF-8"?><messages>';
        foreach($messages as $message){
            $response.= "<message id = '{$message['msgid']}' sender = '{$messagingMOD->usernameByID($message['sender_id'])}' subject = '{$message['subject']}' date = '{$message['date_sent']}'>";
            $response.= $message['body'];
            $response.= '</message>';
        }
        $response.= '</messages>';
        header('Content-Type: text/xml');
        $xmlOutput = new SimpleXMLElement($response);
        print $xmlOutput->asXML();
    }else{
        echo 'Sorry. No messages.';
        die();
    }
}else{
    header('Location: index.php');
}