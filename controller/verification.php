<?php

function userDataValidation($userData){
    if(isset($userData['firstname'],$userData['lastname'], 
    $userData['username'], $userData['signpass']) 
    && !empty($userData['firstname']) && !empty($userData['lastname']) 
    && !empty($userData['username']) && !empty($userData['signpass']) ){
        $noSpecialChar = "/[-!$%^&*()_+|~=`{}\[\]:\";'<>?,.\/]/";
        $passwordReg = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/";
        if(preg_match($noSpecialChar, $userData['firstname'])){
            echo 'Fistname, lastname and username should only have lowercase letters, uppercase letter and numbers';
            die();
        }elseif(preg_match($noSpecialChar, $userData['lastname'])){
            echo 'Fistname, lastname and username should only have lowercase letters, uppercase letter and numbers';
            die();
        }elseif(preg_match($noSpecialChar, $userData['username'])){
            echo 'Fistname, lastname and username should only have lowercase letters, uppercase letter and numbers';
            die();
        }elseif(!preg_match($passwordReg, $userData['signpass'])){
            echo "Password should be 8 charachters in legnth, containing at least 1 digit and 1 capital letter";
            die();
        }
    }else{
        echo "Please fill in all fields";
        die();
    }
}


function messageDataValidation($messageData){
    if(empty($messageData['subject'])){
       echo 'Subject cannot be empty'; 
       die();
    }elseif(empty($messageData['message'])){
        echo 'Message cannot be empty'; 
        die();
    }elseif(empty($messageData['recip'][0])){
        echo 'At least one recipiet should be listed';
        die();
    }

}