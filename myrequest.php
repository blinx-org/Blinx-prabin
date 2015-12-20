<?php
include_once './libs/const.php';
$_pageid = 113;
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "My Request Service";
        include_once './tags/common/head.php';
        ?>
        <!-- end:tagline -->

        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </head>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "/blinx/libs/acceptance.php",
                async: false,
                dataType: "json",
                data:
                        {
                            action: 'update_request',
                            status: '<?php echo $_POST['status'] ?>',
                            vid: <?php echo $_POST['vid'] ?>,
                            reqID: <?php echo $_POST['reqid'] ?>,
                            Uid: <?php echo $_POST["usrid"] ?>
                        },
                success: function (msg)
                {
					$data=msg[0];
					$status=$data["DBStatus"];
                    if($status=="1")
					{
						$("#success").show();
						$("#failure").hide();
					}
					else
					{
						$("#success").hide();
						$("#failure").show();
					}
                },
                error: function (error) {
                    $("#success").hide();
                    $("#failure").show();
                }
            });
            
        });
    </script>
    <body >
		<?php include_once './tags/global_header/header.php'; ?>
		<div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> My Service Request.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div id="success">
						<?php
						//load the old request
						//TODO need to add new 
						include './libs/request.php';
						//hard coded till sitn in integration
						$__data = run_query($_POST['reqid']);
						$data = $__data["request"][0];
						?>
						<div class="alert alert-success" role="alert">
							Thanks for accepting help request from 
							<b><?php echo $data["first_name"] . " " . $data["last_name"] ?></b>
							. We have sent you contact and address details of  
							<b><?php echo $data["first_name"] . " " . $data["last_name"] ?></b>
							to your registered email address.
                        </div>
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-success" role="alert">Scan the QR code to get the route.</div>
							</div>
						</div>
						<?php
                        $google_url = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode("https://www.google.com/maps/dir/12.9220774,77.6807421/" . $data["latitude"] . "," . $data["longitude"]);
						?> 
						<div class="row sr-br-div">
							<div class="col-xs-2">
								<img style="width: 100%; height: 100%;max-width: 116px;" class="media-object" src="<?php echo $google_url ?>" alt="Scan to get the route.">
							</div>	
							<div class="col-xs-10">
                            <h4 class="media-heading"><?php echo $data["first_name"] . " " . $data["last_name"] ?></h4>
                            <p>
                                Type of service <b><?php echo $data["Description"] ?></b> 
                                <?php (isset($data["duration"]) ? " for " . $data["duration"] . "Hrs" : "") ?> on 
                                <code><?php echo $data["Requesteddate"] ?></code>
                                <?php if (isset($data["Location"])) { ?>
                                    at <a target="_blank" href="https://www.google.com/maps/place/<?php echo $data["latitude"] ?>,<?php echo $data["longitude"] ?>"><?php echo $data["Location"] ?></a>
                                    <?php
                                }
                                echo $data["Message"];
                                ?>
                            </p>
                        </div>
						</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="failure">
                            <div class="alert alert-success" role="alert">Sorry we are unable to accept to help request . We will get back to you soon</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
