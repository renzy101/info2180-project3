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
               window.location.assign("logout");
           });
        
            $('.signup').bind('click', function() {
            
                $('.form-login').removeClass('hidden');
                $('.form-signup').removeClass('hidden');
                $('.form-login').addClass('visible');
                $('.form-signup').addClass('visible');
                $('.content').addClass('signup-yes');
            })
});