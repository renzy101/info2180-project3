<?php
session_start();

if(isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] ==='POST'){
    require 'models/messaging.model.php';
    require 'controller/sanitation.php';
    require 'controller/verification.php';
    
    //collect message post variables
    $recipient = sanitation(explode(',', $_POST['recip']));
    $messageData = sanitation(['subject' => $_POST['subject'], 'message' => $_POST['msg']]);
    $messageData['recip'] = $recipient;
    
    messageDataValidation($messageData);
    
    $messagingMOD = new MessagingModel();
    
    echo $messagingMOD->sendMessage('shadow',$messageData);

}else{
    header('Location: index.php');
}
