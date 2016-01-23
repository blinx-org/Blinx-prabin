<?php
date_default_timezone_set('Asia/Kolkata');
$firstname = isset($_POST["fname"])?$_POST["fname"]:'';
$lastname = isset($_POST["lname"])?$_POST["lname"]:'';
$email = isset($_POST["email"])?$_POST["email"]:'';
$phone = isset($_POST["phone"])?$_POST["phone"]:'';
$pwd = isset($_POST["passwd"])?$_POST["passwd"]:'';
$place1= isset($_POST["latitude"])?$_POST["latitude"]:'';
$place2= isset($_POST["longitude"])?$_POST["longitude"]:'';
$location=isset($_POST["autocomplete"])?$_POST["autocomplete"]:'';
$address=isset($_POST["address"])?$_POST["address"]:'';
$signup = isset($_POST["signup"])?$_POST["signup"]:'';
if($signup=="Signup")
{
	$data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
		$DbStatus=$data['Status'];		
		if($firstname=='' || $lastname=='' || $email==''|| $phone=='' || $place1=='' || $place2==''||$pwd==''||$location==''||$address=='')
		{
			$status=$data['Status'];
		}
		else
		{
			include '.\libs\dbconnection.php';
			$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
			$sql1="select count(*)  as count from m_volunteer where mobile_number='".$phone."' or email_id='".$email."'";
			$result = mysqli_query($conn,$sql1);
			if (!$result) 
			{
			  foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']=$sql1;
              }
			}
			else
			{
				
				$count = mysqli_fetch_object($result)->count; 
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
					   $date = date('Y-m-d H:i:s');
					   
					   $sql="INSERT INTO m_volunteer "
								   . "(volunteer_id,"
								   . "first_name,"
								   . "last_name,"
								   . "email_id,"
								   . "mobile_number,"
								   . "lati,"
								   . "longi,"
								   . "location,"
								   . "address,"
								   . "cud,"
								   . "create_time,"
								   . "pwd)"
								   . "VALUES"
								   . "( ".$bid.",'".$firstname."',"
								   . "'".$lastname."','".$email."','".$phone."','".$place1."','".$place2."','".$location."','".$address."',"
								   . "'C','".$date."','".$pwd."')";
							if (!mysqli_query($conn,$sql))
							{
								foreach($DbStatus as $key=>$bal) {
									$DbStatus[$key]['DBStatus']="0";
									$DbStatus[$key]['Message']=$sql;
								}
							}
							else
							{
							   foreach($DbStatus as $key=>$bal) {
									$DbStatus[$key]['DBStatus']="1";
									$DbStatus[$key]['Message']=$sql;
								}
								header("Location: ./aftersignin.php");
							}
					}
				}
				else
				{
						foreach($DbStatus as $key=>$bal) {
						$DbStatus[$key]['DBStatus']="2";
						$DbStatus[$key]['Message']="User is already registered";
					}
				}
		
			}
			$status=$DbStatus;
		}
}
else
{

}		
?>		
