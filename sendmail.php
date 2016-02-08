<?php
$mail=$_GET['mail'];
mailto($mail,1);
function mailto($mail,$id)
{
    $value=false;
    $value1=false;
    $included_files=get_included_files();
    foreach ($included_files as $filename) {
    $pieces = explode("\\", $filename);
    $value=in_array("dbconnection.php", $pieces);
    if($value==true)
    {
        $value1=true;
    };
    };
    if(!$value1)
        include '.\libs\dbconnection.php';
    
    if($mail=="1")
    {
        $dbHelper=new DB();
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$id."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmCode'];
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
        $message.="<a href='http://wwww.blinx.org.in/user-confirmation.php?id=".$vid."&email=".$to."&confirmation_code=".$confirmCode."'>click</a>";
        $message.='</div>';
        $message.='</body></html>';
        mail($to, $subject, $message, $headers);
    }
    if($mail=="2")
    {
        $value=false;
        $value1=false;
        $included_files=get_included_files();
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("dbconnection.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\dbconnection.php';
        $value=false;
        $value1=false;
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("request.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\request.php';
   
        $dbHelper=new DB();
        $data=run_query($id);
        session_start();
        $vid=$_SESSION['mobile'];
        $vid='9538088668';
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmCode'];
        $subject = 'Request Acceptance';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
        $message.='Request ACceptance';
        $message.='</div>';
        $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
                "<br></br>".
            "Thanks you for accepting the request. The below are request details.".
            '</P>';
        $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
		    '<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>'.
                    '</p>';
        $message.='<div style=font-family: Arial;><br/>';
        $message.='</div>';
        $message.='</body></html>';
        mail($to, $subject, $message, $headers);
    }
    if($mail=="3")
    {
        $value=false;
        $value1=false;
        $included_files=get_included_files();
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("dbconnection.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\dbconnection.php';
        $value=false;
        $value1=false;
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("request.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\request.php';
   
        $dbHelper=new DB();
        $data=run_query($id);
        session_start();
        $vid=$_SESSION['mobile'];
        $vid='9538088668';
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmCode'];
        $subject = 'Request Acceptance';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
        $message.='Request ACceptance';
        $message.='</div>';
        $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
                "<br></br>".
            "your request is cancelled. The below are request details.".
            '</P>';
        $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
		    '<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>'.
                    '</p>';
        $message.='<div style=font-family: Arial;><br/>';
        $message.='</div>';
        $message.='</body></html>';
        mail($to, $subject, $message, $headers);
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
            }

?>