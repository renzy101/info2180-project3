<?php

require 'models/basicModel.php';

class MessagingModel extends BasicModel{
    
    public function sendMessage($sender,$messageData){
        $senderInfo = $this->getAllUserInfo($sender);
        
        if($senderInfo !== false){
            $successful = 'Sent to: ';
            $failed = '<br>Failed to send to: ';
            $messageQuery = $this->connector->prepare("INSERT INTO messages(recipient_ids,sender_id,subject,body) VALUES(:recip_id,:sender_id,:subject,:body)");
            
            foreach($messageData['recip'] as $recipientUserName){
                $recipient = $this->getAllUserInfo($recipientUserName);
                
                if($recipient === false){
                    $failed .= $recipientUserName.' ';
                }else{
                    $messageQuery->bindParam(':recip_id', $recipient['userid'], PDO::PARAM_STR);
                    $messageQuery->bindParam(':sender_id', $senderInfo['userid'], PDO::PARAM_STR);
                    $messageQuery->bindParam(':subject', $messageData['subject'], PDO::PARAM_STR);
                    $messageQuery->bindParam(':body', $messageData['message'], PDO::PARAM_STR);
                    $messageQuery->execute();
                    $successful .= $recipientUserName.' ';
                }
            }
            return $successful.$failed;
        }
        return 'User Does Not Exsist';
    }
    
}