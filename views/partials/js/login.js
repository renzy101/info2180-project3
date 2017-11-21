$(document).ready(function(){
    document.getElementById("btn").addEventListener("click",function(event){
        event.preventDefault();
        
        $.ajax({
            url:"log",
            method:"POST",
            data: $("#loginform").serialize()
        }).done(function(result){
            if (result == 1){
                $('#mainarea').load("admin");
            }else if(result == 2){
                $('#mainarea').load("home");
            }
            else{
                $('#message').text(result);
            }
        })
    });
})