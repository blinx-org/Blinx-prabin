<?php
date_default_timezone_set('Asia/Kolkata');
include 'dbconnection.php';
include 'ChromePhp.php';
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
	$dbHelper=new DB();
	$data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
		$DbStatus=$data['Status'];		
		if($firstname=='' || $lastname=='' || $email==''|| $phone=='' || $place1=='' || $place2==''||$pwd==''||$location==''||$address=='')
		{
			ChromePhp::log('Hello console!');
			$status=$data['Status'];
		}
		else
		{
			ChromePhp::log('Hello Bonsole!');
			$sql1="select count(*)  as count from m_volunteer where mobile_number='".$phone."' or email_id='".$email."'";
			$result=$dbHelper->runSelectQuery($sql1);
			if (!is_array($result)&&count($result)<=0) 
			{
			  foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']=$sql1;
              }
			}
			else
			{
				
				$count = count($result); 
				if(intval($count)==0)
				{
					$sql2="select COALESCE(MAX(volunteer_id), 0) as id from m_volunteer";
					$result1=$dbHelper->runSelectQuery($sql2);
					if (!is_array($result1)&&count($result1)<=0) 
					{
						foreach($DbStatus as $key=>$bal) {
						$DbStatus[$key]['DBStatus']="0";
						$DbStatus[$key]['Message']="Failed to run query";
						}
					} 
					else
					{
					   $id = $result1[0]['id']; 
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
								   $affected=$dbHelper->runSelectQuery($sql);
							if (!$affected>0)
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
									$DbStatus[$key]['Message']="Success";
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
