<?php
include_once './libs/const.php';
$_pageid = 112;
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Request Service";
        include_once './tags/common/head.php';
        ?>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
    </head>

    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <div style="margin-top: 60px"></div>
                    </div>
                </div>
				<?php
                    include './tags/user/usersignup.php';
                ?>
			</div>
		</div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </body>
</html>
