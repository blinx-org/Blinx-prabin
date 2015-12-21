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
		function updateTable()
		{
			$.ajax({
					type: "GET",
					url:"/blinx/libs/search.php",
					async:false,
					dataType :"json",
					data: 
					{
						action : 'volunteer_requests',
						vid : '12'
					},
					success: function (msg) 
					{
						console.log(msg);
						if (msg) 
						{
							$.each(msg, function(key, line) 
							{
								$("#table1").append(
										"<tr>"+
										"<td>" + line.first_name +" "+line.last_name  + "</td>"+
										"<td>" + line.statusDesc + "</td>"+
										"<td>" + line.Requesteddate + "</td>"+
										"<td>" + line.Datetime + "</td>"+
										"</tr>");
							});
							
						}
						else 
						{
							console.log("error");
						}
					},
					error : function(error) {
						console.log(error);
					},
					
                });
		}
	</script>
    <body onload="updateTable()">
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
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo URL_HOME ?>">Home</a></li>
                            <li class="active">Accept Request</li>
                        </ol>
                    </div>
                </div>
                <?php
				$vid=isset($_POST['vid'])?$_POST['vid']:'12';
                if ((empty($vid)) || ('' == @$vid)) {
					$value = 'Unable to fetch request please try <a href="' . URL_SEARCH . '">again</a>';
                    TODO //update db 
                    ?>
					<div class="alert alert-warning" role="alert"><?php echo $value ?></div>
                    <?php
                }
				else
				{?>
                    <div class="alert alert-success" role="alert">Your Requests</div>
					<?php
				}	
                ?>
                    <div class="row sr-br-div">
                        <div class="col-xs-12">
							<table id="table1" class="table table-hover">
								<thead>
									<tr>
										<th>Name</th>
										<th>Status</th>
										<th>Requested Date</th>
										<th>Accepted Date</th>
									</tr>
								</thead>
							</table>
                        </div>
                    </div>
            </div>
        </div>
          <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
