$(document).ready(function(){
    document.getElementById("btn").addEventListener("click",function(event){
        event.preventDefault();
        var uname=document.getElementById("username");
        var pword=document.getElementById("pass");
        var body=$("#loginform").serialize();
        $.ajax({
            url:"log",
            method:"POST",
            data:body
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