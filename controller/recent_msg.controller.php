<?php
session_start();

if(isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    require 'models/messaging.model.php';
    $messagingMOD = new MessagingModel();
    $messages = $messagingMOD->recents($_SESSION['user']);
    $data = new \stdClass();
    $data->message = 'null';
    $data->data = array();
    if($messages){
        $data->message = 'true';
        foreach($messages as $message){
            if($messagingMOD->is_read($message['msgid'])){
                $read = 1;
            }else{
                $read = 0;
            }
            $sender = $messagingMOD->userInfoByID($message['sender_id']);
            $msg = array('senderid'=>$sender,'msgid'=>$message['msgid'],'fname'=>$sender['userfname'],'lname'=>$sender['userlname'],'username'=>$sender['username'],'subject'=>$message['subject'],'date'=>$message['date_sent'],'seen'=>$read,'body'=>$message['body']);
            array_push($data->data, $msg);
        }
        die(json_encode($data));

    }else{
        die(json_encode($data));
    }
}else{
    header('Location: index.php');
}