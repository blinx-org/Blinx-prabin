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
		<?php
            include_once('./libs/signup.php');
            //include('./libs/login.php'); // Includes Login Script
        ?>
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
        function showerrormessage(message) {
            $("#message").text(message);
			$("#message").show();
        }
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
				showerrormessage(error);
				return false;

			} else if ((fld.value.length < 5) || (fld.value.length > 12)) {
				fld.style.background = 'Yellow';
				error = "The username is the wrong length.\n";
				showerrormessage(error);
				return false;

			} else if (illegalChars.test(fld.value)) {
				fld.style.background = 'Yellow';
				error = "The username contains illegal characters.\n";
				showerrormessage(error);
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
				showerrormessage(error);
				return false;
		 
			} else if ((fld.length < 7) || (fld.length > 15)) {
				error = "The password is the wrong length. \n";
				fld.style.background = 'Yellow';
				showerrormessage(error);
				return false;
		 
			} else if (illegalChars.test(fld)) {
				error = "The password contains illegal characters.\n";
				fld.style.background = 'Yellow';
				showerrormessage(error);
				return false;
		 
			} else if ( (fld.search(/[a-zA-Z]+/)==-1) || (fld.search(/[0-9]+/)==-1) ) {
				error = "The password must contain at least one numeral.\n";
				fld.style.background = 'Yellow';
				showerrormessage(error);
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
				showerrormessage('Username must have alphabet characters only');
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
				showerrormessage('User address must have alphanumeric characters only');
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
			showerrormessage('Please provide a valid email address');
			email.focus;
			return false;
			}
		}
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
                <form method="POST"  class="form-horizontal" id="regform" action="" onsubmit="return validateForm()">
					<div class="col-md-3"></div>
					<div class="col-md-6" style="Background-color: #F8F8F8;">
					   <div class="control-group">
						   <h3 class="secHeading" style="text-align: center;
														font-weight: bold;
														">Join Us</h3>
						</div>
						<p class="alert-danger" id="message" >
                                           <script>
											showerrormessage
											(
											<?php 
												if($status!='')
												{
													if($status[0]['DBStatus']=="0")
													{
														$sql=$status[0]['Message'];
														echo "'".$sql."'";
													}
													else if($status[0]['DBStatus']=="2")
													{
														echo "'".$status[0]['Message']."'";
													}
													else
													{
														echo '';
													}
												}
											?>
											);
										   </script>
                                        </p> 
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
								<input id="signup" type="hidden" name="signup" value="Signup">
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
