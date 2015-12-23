<?php
date_default_timezone_set('Asia/Kolkata');
$firstname = isset($_POST["firstname"])?$_POST["firstname"]:'';
$lastname = isset($_POST["lastname"])?$_POST["firstname"]:'';
$email = isset($_POST["email"])?$_POST["email"]:'';
$phone = isset($_POST["phone"])?$_POST["phone"]:'';
$pwd = isset($_POST["paswd"])?$_POST["paswd"]:'';
$place1= isset($_POST["latitude"])?$_POST["latitude"]:'';
$place2= isset($_POST["longitude"])?$_POST["longitude"]:'';
		$data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
		$DbStatus=$data['Status'];		
		if($firstname=='' || $lastname=='' || $email==''|| $phone=='' || $place1=='' || $place2=='')
		{
			echo json_encode($data['Status']);;
		}
		else
		{
			
			include './dbconnection.php';
			$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
			$sql1="select count(*)  as count from m_volunteer where mobile_number='"+$phone1+"' or email_id='"+$email+"'";
			$result = mysqli_query($conn,$sql1);
			if (!$result) 
			{
			  foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="2";
                    $DbStatus[$key]['Message']="The user is already registered";
              }
			}
			else
			{
				$count = mysqli_fetch_object($result)->count; 
				//logToFile((string)$row[0]);
				if(intval($count)==0)
				{
					$sql2="select COALESCE(MAX(volunteer_id), 0) as id from m_volunteer";
					$result1=mysqli_query($conn,$sql2);
					if (!$result1) 
					{
						foreach($DbStatus as $key=>$bal) {
						$DbStatus[$key]['DBStatus']="0";
						$DbStatus[$key]['Message']="Failed to run query";
						}
					} 
				   else
					{
					   $id = mysqli_fetch_object($result1)->id; 
					   $bid=intval($id)+1;
					   logToFile($bid);
					   $sql="INSERT INTO m_volunteer "
								   . "(volunteer_id,"
								   . "first_name,"
								   . "last_name,"
								   . "email_id,"
								   . "mobile_number,"
								   . "lati,"
								   . "longi,"
								   . "cud,"
								   . "create_time,"
								   . "pwd)"
								   . "VALUES"
								   . "( $bid,'$firstname',"
								   . "'$lastname','$email','$phone','$place1','$place2','C',now(),'$pwd')";
							if (!mysqli_query($conn,$sql))
							{
								foreach($DbStatus as $key=>$bal) {
									$DbStatus[$key]['DBStatus']="0";
									$DbStatus[$key]['Message']="Failed to run query";
								}
							}
							else
							{
							   foreach($DbStatus as $key=>$bal) {
									$DbStatus[$key]['DBStatus']="1";
									$DbStatus[$key]['Message']="Successfully";
								}
							}
					}
				}
				else
				{
						foreach($DbStatus as $key=>$bal) {
						$DbStatus[$key]['DBStatus']="0";
						$DbStatus[$key]['Message']="Failed to run query";
					}
				}
		
			}
			echo $DbStatus;
		}
	
?>		