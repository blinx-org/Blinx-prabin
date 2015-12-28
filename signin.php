<?php
include_once './libs/const.php';
$_pageid = 113;
?>

<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Sign In";
        include_once './tags/common/head.php';
        //include('./libs/login.php'); // Includes Login Script
        ?>
         <?php
            include_once('./libs/login.php');
            //include('./libs/login.php'); // Includes Login Script
        ?>
		<?php include_once './tags/common/scripts.php'; ?>
    </head>
	<style type="text/css">
	</style>
	<script>

  	$(document).ready(function()
        {
            $("#message").hide();
        });
        function showerrormessage(message) {
            $("#message").text(message);
        }
        function validateform()
        {
            var username = $("#username").val();
            var password = $("#password").val();   
            if(username=='')
            {
                $("#message").text("Please enter username");
                $("#message").show();
                return false;
            }
            else if(password=='')
            {
                $("#message").text("Please enter password");
                return false;
            }
            else if(username=='' || password=='')
            {
                $("#message").text("Please enter valid credentials");
                return false;
            }
        };
    </script> 
    <style>
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
    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> Log In</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
					<div class="col-md-12" style="Background-color: #F8F8F8;">
					   <div class="control-group">
						   <h3 class="secHeading" style="text-align: center;
														font-weight: bold;
														">Login</h3>
							<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-md-8 col-md-offset-2">                    
                                <div class="panel panel-info" >
                                <div class="panel-heading">
                                        <div class="panel-title">Sign In</div>
                                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                                </div>     
                                <div style="padding-top:30px" class="panel-body" >
                                    <div style="display:none" id="login-alert" class="alert alert-danger col-md-12"></div>
                                    <form id="loginform" class="form-horizontal" role="form" action="" method="POST" onsubmit="return validateform()">
                                        <p class="alert-danger" id="message">
                                          <script>
                                            this.text("AAA")
                                          </script>
                                        </p> 
                                        <div style="margin-bottom: 5px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="username" type="text" class="form-control" name="username" value="" placeholder="username or phone">                                        
                                        </div>
                                        <div style="margin-bottom: 2px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="password">
                                            <input id="signin" type="hidden" name="signin" value="Login">
                                        </div>
                                            <div style="margin-top:10px" class="form-group">
                                            <div class="col-md-12 controls">
                                              <button id="btn-login" type="submit" class="btn btn-success">Login</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 control">
                                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                                    Don't have an account! 
                                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                                        Sign Up Here
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>     
                                </div>                     
                                </div>  
                            </div>
						</div>
					</div>
                </div>
            </div>
            <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
