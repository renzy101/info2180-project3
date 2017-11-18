<?php
function sanitation($userData){
    
    foreach($userData as $key => $data){
        $userData[$key] = trim(strip_tags($data));
    }
    
    return $userData;
}