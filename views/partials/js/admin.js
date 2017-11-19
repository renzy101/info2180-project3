/* global $*/
$(document).ready(function(){
    $('input').change(function() {

                $('input[required]:invalid').addClass('invalid');
                $('input[required]:valid').addClass('valid').removeClass('invalid');

            });
        
           // $('.login').bind('click', function() {
        
            //    $('.form-login').removeClass('hidden');
             //   $('.form-login').addClass('visible');
               // $('.content').addClass('login-yes')
        
           // })
           $('.logout').bind('click',function(){
               window.location.assign("logout")
           });
           
           for(var i=0;i<$(".signup").length; i++){
                $(".signup")[i].type = "button";
            }
            $(".submit")[0].type = "submit";
            
        
            $('.signup').bind('click', function() {
            
                $('.form-login').removeClass('hidden');
                $('.form-signup').removeClass('hidden');
                $('.form-login').addClass('visible');
                $('.form-signup').addClass('visible');
                $('.content').addClass('signup-yes');
                $('.submit').removeClass('hidden');
            })
            
            
            $('#addnew').bind('click',function(event){
                event.preventDefault();
               var firstname=$("[name='firstname']").val().trim();
               var lastname=$("[name='lastname']").val().trim();
               var username=$("[name='username']").val().trim();
               var pword=$("[name='signpass']").val().trim();
               if(isEmpty(firstname,lastname,username,pword)!=true){
                   validate(pword);
                   send_request($("#newUser").serialize());
                   
               }               

               
           });
           
        function clearFields(){
            $("[name='firstname']").val("");
            $("[name='lastname']").val("");
            $("[name='username']").val("");
            $("[name='signpass']").val("");
            $("[name='cpass']").val("");
        }

        function isEmpty(fname,lname,uname,pword){
            if (fname==''){
                   window.alert("First-name must be filled in."); //Placeholder responses to empty data fields.
                   return true;
           }
           if (lname===''){
                   window.alert("Last-name must be filled in.");
                   return true;
           }
            if (uname===''){
                   window.alert("A username is required.");
                   return true;
           }
            if (pword===''){
                   window.alert("A password is required.")
                   return true;
           }
           
        }
        
        function validate(pword){
            //Test password with regex for password pattern
            //strip tags
            var regularExpression  = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
            if(!regularExpression.test(pword)) {
                alert("Password should be 8 charachters in legnth, containing at least 1 digit and 1 capital letter");
                return false;
            }
        }
            
         function send_request(newUser){
             $.ajax({
                 url: "signup",
                 type: "POST",
                 data: newUser,
                 success: function(response){
                     $('#usermessage').text(response);
                     clearFields();
                 },
                 failure: function(response){
                     $('#usermessage').text(response);
                 }
            });
         }   
});