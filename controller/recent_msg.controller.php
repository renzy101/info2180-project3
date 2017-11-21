<?php
session_start();

if(isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    require 'models/messaging.model.php';
    
    $messagingMOD = new MessagingModel();
    $messages = $messagingMOD->recents($_SESSION['user']);
    
    if($messages){
        $response = '<?xml version="1.0"  encoding="UTF-8"?><messages>';
        foreach($messages as $message){
            if($messagingMOD->is_read($message['msgid'])){
                $read = 1;
            }else{
                $read = 0;
            }
            $sender = $messagingMOD->userInfoByID($message['sender_id']);
            $response.= "<message id = '{$message['msgid']}' fname = '{$sender['userfname']}' lname = '{$sender['userlname']}' sender = '{$sender['username']}' subject = '{$message['subject']}' date = '{$message['date_sent']}' read = '{$read}'>";
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