<?php
$mail="1";
if($mail=="1")
{
    include './libs/dbconnection.php';
    $dbHelper=new DB();
    session_start();
    $vid=$_SESSION['mobile'];
    $vid=9538088668;
    $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
    $result=$dbHelper->runSelectQuery($query);
    $to      = $result[0]['email_id'];
    $subject = 'Thanks for joining & Email Verification';
    $headers = "From: blinx.app@gmail.com \r\n";
    $headers .= "Reply-To: email@domain.com \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message = '<html><body>';
    $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
    $message.='Verification mail';
    $message.='</div>';
    $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
            "<br></br>".
        "Firstly, a heartfelt 'Thank you' for having registered on BLINX a Volunteer..".
        "It means you believe in the power of good, in our country's '".
        "future and your ability to make a change. Yet, since you haven't made any contributions yet, '".
        "I'm assuming something is holding you back." .
        "I look forward to hearing from you! </P>'";
    $message.='<div style=font-family: Arial;><br/>';
    $message.='click on the below link to verify your account ';
    $message.="<a href='http://wwww.blinx.org.in/user-confirmation.php?id=1&email=1&confirmation_code=1'>click</a>";
    $message.='</div>';
    $message.='</body></html>';
    mail($to, $subject, $message, $headers);
}
?>