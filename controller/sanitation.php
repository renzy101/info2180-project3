<?php
function sanitation($userData){
    
    foreach($userData as $key => $data){
        $userData[$key] = strip_tags($data);
    }
    
    return $userData;
}