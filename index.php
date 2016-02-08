<?php
include_once './libs/const.php';
$_pageid = 3;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $_TITLE = "Blinx Home page";
        //var_dump($_SESSION['login_user']);
        include_once './tags/common/head.php';
        ?>
    </head>
    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <!-- begin:slider -->
        <?php include_once './tags/home/billbord.php'; ?>
        <div id="tagline">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>The Site s still under construction.</h2>
                        <h2>LEND YOUR SIGHT WHEN ALIVE , DONATE YOUR EYES AFTER DEATH</h2>
                        <h2>YOU WILL BE PLEASANTLY SURPRISED BY THE CHANGES YOU CAN BRING INTO THEIR LIVES.</h2>
                        <p style="text-align:left">Eyes are windows to the world’. This saying brings 
                           out the importance of the healthy vision. Only healthy eyes can 
                           serve as a clean, clear window, through which people can acquire immense knowledge.
                           Sometimes,  the health of the vision gets deteriorated. 
                           In many cases, it can be supplemented by wearing glasses of varying powers of the lenses. 
                           We see from some small boys and girls to middle aged, and senior citizens wear glasses, 
                           that is extra pair of eyes to serve as the windows to the world. 
                           But, unfortunately, some vision defects completely close this window to the world.   
                           We are talking about the blind and severely visually impaired persons, 
                           for whom the options to open the window are very limited.<br><br>
                           Blindness may happen to anyone, at any time and at any place. 
                           People become blind due to accidents, wrong treatment, optical imbalance or a genetic defect.  
                           Blind do not demand anyone’s pity. 
                           They just want others’ understanding and willingness to help them in their endeavour to empower 
                           themselves. mainly through education, so that they also can walk along with others as 
                           equal participants in this colourful life.<br><br>
                           BLINX aims to serve as a bridge between the service oriented volunteers and 
                           the visually challenged who would benefit from their valuable service. 
                           You can make these disabled as differently able people, by helping them in the academics, 
                           by reading books, writing exams, by taking classes even from distance, and in so many other ways. 
                           A visually challenged youngsters  need special and individual attention to understand different 
                           subjects.  you can be their sight.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once './tags/home/service.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php include_once './tags/home/testimonials.php'; ?>
                </div>
                <!--<div class="col-sm-6">
                    <?php include_once './tags/home/twitter.php'; ?>
                </div>-->
            </div>
        </div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </body>
</html>