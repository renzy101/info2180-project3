$(document).ready(main);


function request(url){
    $.ajax({
        url: url,
        method: 'POST'
    }).done(function(result){
        if(result == 0){
            $('#mainarea').load('login');
        }else if(result == 1){
            $('#mainarea').load('admin');
            
        }else if(result == 2){
            $('#mainarea').load('home');
        }
    });
}

function main(){
    request('SC');
    
}