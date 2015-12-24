<?php
include_once './libs/const.php';
$_pageid = 113;
?>

<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Join Us";
        include_once './tags/common/head.php';
        ?>
		<?php include_once './tags/common/scripts.php'; ?>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    </head>
	<style type="text/css">
	</style>
	<script>
		var lati='';
		var lngi='';
        function initialize()
		{
			var input = document.getElementById('autocomplete');
			var options = {componentRestrictions: {country: 'in'}};
			var autocomplete=new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete,'place_changed', function()
            {
                var inputA = document.getElementById('autocomplete').value;
                var geocoder = new google.maps.Geocoder();
				geocoder.geocode({
				'address': inputA
				}, function(results, status) {
					if (status === google.maps.GeocoderStatus.OK) 
					{
						lati=results[0].geometry.location.lat();    
						lngi=results[0].geometry.location.lng(); 
						$('#latitude').val(lati);
						$('#longitude').val(lngi);
					}
				});
            });
			
        };
		function validateForm()
		{
			var firstname = $("#fname").val();
			var lastname=$("#lname").val();
			var mobile = $("#phone").val();
			var pwd = $("#passwd").val();
			var uemail = $("#email").val();
			if(allLetter(firstname))
			{
				if(validatePassword(pwd,5,12))
				{
					if(allLetter(lastname))
					{
						if(allnumeric(mobile))
						{
							if(ValidateEmail(uemail))
							{
								return true;
							}
						}
					}
				}
			}
			return false;
		};
		function validateUsername(fld) 
		{
			var error = "";
			var illegalChars = /\W/; // allow letters, numbers, and underscores

			if (fld.value == "") {
				fld.style.background = 'Yellow';
				error = "You didn't enter a username.\n";
				alert(error);
				return false;

			} else if ((fld.value.length < 5) || (fld.value.length > 12)) {
				fld.style.background = 'Yellow';
				error = "The username is the wrong length.\n";
				alert(error);
				return false;

			} else if (illegalChars.test(fld.value)) {
				fld.style.background = 'Yellow';
				error = "The username contains illegal characters.\n";
				alert(error);
				return false;

			} else {
				fld.style.background = 'White';
			}
			return true;
		};
		function validatePassword(fld) 
		{
			var error = "";
			var illegalChars = /[\W_]/; // allow only letters and numbers
		 
			if (fld == "") {
				fld.style.background = 'Yellow';
				error = "You didn't enter a password.\n";
				alert(error);
				return false;
		 
			} else if ((fld.length < 7) || (fld.length > 15)) {
				error = "The password is the wrong length. \n";
				fld.style.background = 'Yellow';
				alert(error);
				return false;
		 
			} else if (illegalChars.test(fld)) {
				error = "The password contains illegal characters.\n";
				fld.style.background = 'Yellow';
				alert(error);
				return false;
		 
			} else if ( (fld.search(/[a-zA-Z]+/)==-1) || (fld.search(/[0-9]+/)==-1) ) {
				error = "The password must contain at least one numeral.\n";
				fld.style.background = 'Yellow';
				alert(error);
				return false;
		 
			} else {
				fld.style.background = 'White';
			}
		   return true;
		};
		function allLetter(uname)
		{
			var letters = /^[A-Za-z]+$/;
			var re = new RegExp(letters);
			if(uname.match(re))
			{
				return true;
			}
			else
			{
				alert('Username must have alphabet characters only');
				return false;
			}
		};
		function alphanumeric(uadd)
		{
			var letters = /^[0-9a-zA-Z]+$/;
			if(uadd.match(letters))
			{
				return true;
			}
			else
			{
				alert('User address must have alphanumeric characters only');
				return false;
			}
		};
		function allnumeric(uzip)
		{
			var numbers = /^[0-9]+$/;
			if(uzip.match(numbers))
			{
				return true;
			}
			else
			{
				alert('ZIP code must have numeric characters only');
				return false;
			}
		};
		function checkEmail() {
			var email = document.getElementById('txtEmail');
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

			if (!filter.test(email.value)) {
			alert('Please provide a valid email address');
			email.focus;
			return false;
			}
		}
	</script>
	<script>
			/*$.validator.addMethod('mypassword', function(value, element) 
			{
				return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
			},
			'Password must contain at least one numeric and one alphabetic character.');
            $(document).ready(function()
            {
                 $('#regform').validate({
                rules: 
                {
                        fname:
                        {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                        lname:
                        {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                        email:
                        {
                                required: true,
                                minlength: 2,
                                maxlength: 50
                        },
                        phone: 
                        {
                            required: true,
                            minlength: 10
                        },
                        passwd: 
                        {
                            required: true,
                            minlength: 6,
                            maxlength: 10,
                            mypassword:true
                        },
                        conpasswd:
                        {
                            required: true,
                            minlength: 6,
                            maxlength: 10,
                            equalTo: "#passwd"
                        },
                        autocomplete:
                        {
                            required: true,
                        },
                },
                messages: 
                {
                    fname: { required:"Firstname is required" ,regex:"Only Characters allowed" },
                    lname: { required:"Lastname is required" ,regex:"Only Characters allowed" },
                    email: { required:"Email is required" ,regex:"Oops! Not a valid Email!" },
                    phone: { required:"Phone Number Required.",minlength:"Please enter valid phonenumber"},
                    passwd: { required:"Password is required"},
                    conpasswd: { required:"Confirm password is required"},
                    autocomplete:{required:"Current place of residence is required"}
                },
                errorClass:"invalid",
                validClass: "success",
                errorElement: "label",
                submitHandler: function() 
                {
                var firstname1= $("#fname").val();
                var lastname1= $("#lname").val();
                var phone1= $("#phone").val();
                var email1= $("#email").val();
                var pwd1= $("#passwd").val();
                var dataString = 'firstname='+ firstname1+ '&lastname='+ lastname1+ 
                        '&phone=' + phone1 + '&email=' + email1+
                        '&latitude='+ latitude+ '&longitude='+ longitude+
                        '&paswd=' +  pwd1;
                        alert(dataString);
                        $.ajax({
                                type: "POST",
                                url: "/Blinx/php/signupprocess.php",
                                data: dataString,
                                cache: false,
                                success: function(msg)
                                    {
                                        if(msg.trim()=="2")
                                        {
                                            alert("Already Registered");
                                        }
                                        if(msg.trim()=="0")
                                        {
                                            alert("Failed to  Registered");
                                        }
                                        if(msg.trim()=="1")
                                        {
                                            alert("Registered successfully");
                                        }
                                        $("#firstname").val('');
                                        $("#lastname").val('');
                                        $("#phone").val('');
                                        $("#useremail").val('');
                                        $("#passwd").val('');
                                        $("#conpasswd").val('');
                                        $("#autocomplete").val('');
                                    },
                                    error: function() 
                                    {
                                        alert('Registration not successful');
                                    },
                                });

            }
        });*/
    </script> 
    <style>
        label.invalid
        {
            color: Red;
            padding: 1px;
            font-size: 12px;
            font-weight: normal;
            margin: 0px 0px 0px 45px;
        }
        secHeading{font-size:20px;font-weight:300;word-spacing:normal;letter-spacing:normal}
    </style>
    <body onLoad="initialize()">
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> Join Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <form method="POST"  class="form-horizontal" id="regform" action="/blinx/libs/signup.php" onsubmit="return validateForm()">
					<div class="col-md-3"></div>
					<div class="col-md-6" style="Background-color: #F8F8F8;">
					   <div class="control-group">
						   <h3 class="secHeading" style="text-align: center;
														font-weight: bold;
														">Join Us</h3>
						</div>
						<div class="control-group" style="margin-top:10px">
							<div class="controls">
								<input type="text" class="input-xlarge form-control"
									   style="Height:30px;width:90%;margin-left:45px;
									   border: 1px solid;  border-radius: 4px"
										id="fname" 
										name="fname"
										maxlength="50" value="" tabindex="1"
										autocomplete="on"
										placeholder="First Name">
							</div>
						</div>
						<div class="control-group" style="margin-top:20px">
							<input type="text" class="input-xlarge form-control"
											   style="Height:30px;width:90%;border: 1px solid;
											   margin-left:45px;
											   border-radius: 4px" 
											   id="lname" name="lname" placeholder="Last Name">
						</div>
						<div class="control-group" style="margin-top:20px">
							<div class="controls">
									<input type="text" class="input-xlarge form-control" 
										   style="Height:30px;width:90%;margin-left:45px;
										   border: 1px solid;  border-radius: 4px;" id="email" name="email" placeholder="Email">
							</div>
						</div>
						<div class="control-group" style="margin-top:20px">
							<div class="controls">
									<input type="text" class="input-xlarge form-control"
											   style="Height:30px;width:90%;margin-left:45px;
											   border: 1px solid;  border-radius: 4px" id="phone" name="phone" placeholder="Mobile Number">
							</div>
						</div>
							<div class="control-group" style="margin-top:20px">
								<div class="controls">
										<input type="Password" id="passwd" 
												   style="Height:30px;width:90%;margin-left:45px;
												   border: 1px solid;  border-radius: 4px" class="input-xlarge form-control" name="passwd" placeholder="Password">
								</div>
							</div>
							<div class="control-group" style="margin-top:20px">
								<div class="controls">
										<input type="Password" id="conpasswd" 
												   style="Height:30px;width:90%;margin-left:45px;
												   border: 1px solid;  border-radius: 4px" class="input-xlarge form-control" name="conpasswd" placeholder="Re-enter Password">
								</div>
							</div>
								<div class="control-group" style="margin-top:20px">
							  <div class="controls">
									  <input type="text"
											 class="input-xlarge form-control"
											 style="Height:30px;width:90%;margin-left:45px;
												   border: 1px solid;  border-radius: 4px"
											 id="autocomplete"
											 name="autocomplete"
											 placeholder="Current Place of Residence">
										<input name="latitude"  id="latitude" type="hidden" />
										<input  name="longitude" id="longitude" type="hidden"/>
								  </div>
								</div>
								<div class="control-group" style="margin-top:20px">
							  <div class="controls">
									  <input type="text"
											 class="input-xlarge form-control"
											 style="Height:30px;width:90%;margin-left:45px;
												   border: 1px solid;  border-radius: 4px"
											 id="address"
											 name="address"
											 placeholder="address">
								  </div>
								</div>
							<div class="control-group" style="margin-top:20px">
							  <div class="controls">
							   <button type="submit" class="btn btn-success submit" style="Height:30px;width:90%;margin-left:45px;
												   border: 1px solid;  border-radius: 4px" >JOIN US</button>
							  </div>
							   </div>
								<p class="" style="margin-top:10px; margin-left:50px " >
						By signing up, I agree to the <a href="/termsOfUse" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a>.
							   </p>
					</div>
					<div class="col-md-3"></div>
				</form>
            </div>
        </div>
          <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
