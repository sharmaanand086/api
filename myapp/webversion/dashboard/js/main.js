(function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

})(jQuery);

$('#checkid').click(function(event){
	var countid = 0;
	if(countid == 0){
		countid++;
		const id = document.getElementById('id').value;
			event.preventDefault();
			$.ajax({
		           "url": "../src/getiddata.php",
		           "type": "POST",
		           data: {id:id},
		           dataType: "json",  
		            cache:false,
		         complete: function (response) {
		           // $('#output').html(response.responseText);
		            //alert('this is complete !!');
		        },
		        success :  function (result) {
		           console.log(result);
		            if(result.message){
		                 alert(result.message)
		            }else{
		                   $('#topsection').hide();
		                   $("#checkid").hide();
		                   document.getElementById('name').value = result.name;
		                   document.getElementById('email').value = result.email;
		                   document.getElementById('phone').value = result.phone;
		                   document.getElementById('uniqueid').value = result.uniqueid;
		                   $('#nextid').show(); 

		            }
		        },

		        error: function (error) {
		           // $('#output').html('Bummer: there was an error!');
		           //console.log(error);
		           alert('errore !!');
		        },
		    });
	}else{
		alert('wait processing!!');
	}
	
});

$('#submit').click(function(event){

		var countid = 0;
	if(countid == 0){
		countid++;
		var name = document.getElementById('name').value;
		var email = document.getElementById('email').value;
		var phone = document.getElementById('phone').value;
		var uniqueid = document.getElementById('uniqueid').value;
		var scanid = document.getElementById('qrcode').value;
alert(scanid);
			event.preventDefault();

			if(name != '' && email != '' && phone != '' && scanid != ''){
					$.ajax({
			           "url": "../src/getfiledata.php",
			           "type": "POST",
			           data: {uniqueid:uniqueid,scanid:scanid},
			           
			            cache:false,			        
			        success :  function (data) {
			        	var json_obj = JSON.parse(data);
			            	 if(json_obj.message == 'Successfully created user'){
			            	 	alert('Register Successfully!');
			            	 	location.reload();
			            	 }else{
			            	 	alert(json_obj.message);
			            	 }
			             
			        },

			        error: function (error) {
			        	var json_obj = JSON.parse(error);
			          // console.log(result);
			           alert(json_obj);
			           // $('#output').html('Bummer: there was an error!');
			           //console.log(error);			          
			           alert(error);
			        },
			    });
				}else{
					alert('Somthing Missed!!');
				}
			
	}else{
		alert('wait processing!!');
	}

});