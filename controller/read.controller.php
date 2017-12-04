<?php
session_start();
if(isset($_SESSION['user'])){
    if(!empty($_POST['msgid'])){
        require 'controller/sanitation.php';
        require 'models/messaging.model.php';
        
        $msgid = sanitation(['msgid' => $_POST['msgid']]);
        
        $messagingMOD = new MessagingModel();
        
        if($messagingMOD->is_read($msgid['msgid']) == false){
            if($messagingMOD->markMessageRead($msgid['msgid'])){
                echo 1;
                die();
            }
            echo 0;
            die();
        }
        echo 1;
        die();
    }
    echo -1;
    die();
}else{
    header('Location: /');
}