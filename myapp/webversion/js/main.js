
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(event){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }
        event.preventDefault();
        var email = document.getElementById("email").value;
        var password = document.getElementById("pass").value;

        $.ajax({
           "url": "http://167.71.229.74/myapp/public/api/v1/login",
           "type": "POST",
           data: {email:email,password:password},
           dataType: "json",  
            cache:false,
         complete: function (response) {
           // $('#output').html(response.responseText);
           // alert('this is complete !!');
        },
        success :  function (result) {
           console.log(result.access_token);
            if(result.access_token){
                 window.location.href='dashboard';
            }else{
                    console.log(result);
                 $('#error_msg').text(result.message)
            }
           // $('#output').html('Bummer: there was an error!');
               //$('#chat_process').html(result);
              //getSuccessmessage();
          // alert('success in called !!');
        },

        error: function () {
           // $('#output').html('Bummer: there was an error!');
          // alert('errore !!');
        },
    });

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);