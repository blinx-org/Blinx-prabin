<?php
date_default_timezone_set('Asia/Kolkata');
include 'dbconnection.php';
function signup()
{
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
                //ChromePhp::log('Hello console!');
                $status=$data['Status'];
        }
        else
        {
            //ChromePhp::log('Hello Bonsole!');
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

                    $count = $result[0]['count']; 
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
                                                       $affected=$dbHelper->runQuery($sql);
                                            if (!$affected>0)
                                            {
                                                    foreach($DbStatus as $key=>$bal) {
                                                            $DbStatus[$key]['DBStatus']="0";
                                                            $DbStatus[$key]['Message']=$sql;
                                                    }
                                                    header("Location: ./aftersignin.php?status=JF");
                                            }
                                            else
                                            {
                                               foreach($DbStatus as $key=>$bal) {
                                                            $DbStatus[$key]['DBStatus']="1";
                                                            $DbStatus[$key]['Message']="Success";
                                                    }
                                                    session_start();
                                                    $_SESSION['mobile']=$phone;
                                                    header("Location: ./aftersignin.php?status=JP");
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
    return $status;
}

function changepasssword()
{
    $dbHelper=new DB();
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $date = date('Y-m-d H:i:s');
    $vid = isset($_POST["vid"]) ? $_POST["vid"] : '';
    $pwdold = isset($_POST["oldpwd"]) ? $_POST["oldpwd"] : '';
    $pwdNew = isset($_POST["pwd"]) ? $_POST["pwd"] : '';
    
    if($vid=='' || $pwdold=='' || $pwdNew =='')
    {
        $status=$data['Status'];
    }
    else
    {
        $query = "select count(*) as count,pwd as password from m_volunteer where volunteer_id='".$vid."'";  
        $result=$dbHelper->runSelectQuery($query);
        if (!is_array($result)&&count($result)<=0) 
        {
            foreach($DbStatus as $key=>$bal) {
                  $DbStatus[$key]['DBStatus']="0";
                  $DbStatus[$key]['Message']=$sql1;
              }
        }
        else
        {
            $count = $result[0]['count']; 
            
            if(intval($count)==0)
            {   
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="User Not Available";
                      }
            }
            else 
            {
                $query = "select count(*) as count,pwd as password from m_volunteer where volunteer_id='".$vid."' and pwd='".$pwdold."'";  
                $result=$dbHelper->runSelectQuery($query);
                $pwd = $result[0]['password']; 
            if($pwd!=$pwdold )
            {
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="Old Password is not correct.";
                      }
            }
            else if($pwd==$pwdNew )
            {
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="Old Password and New password cannot be same.";
                      }
            }
            else
            {
                $query = "update m_volunteer set pwd='".$pwdNew."' where volunteer_id='".$vid."'";  
                $affected=$dbHelper->runQuery($query);
                if (!$affected>0)
                {
                        foreach($DbStatus as $key=>$bal) {
                                $DbStatus[$key]['DBStatus']="0";
                                $DbStatus[$key]['Message']=$sql;
                        }
                        header("Location: ./aftersignin.php?status=CF");
                }
                else
                {
                   foreach($DbStatus as $key=>$bal) {
                                $DbStatus[$key]['DBStatus']="1";
                                $DbStatus[$key]['Message']="Success";
                        }
                        header("Location: ./aftersignin.php?status=CP");
                }
            }
             $status=$DbStatus;   
            }
        }
            
        }
        $status=$DbStatus;   
        return $status;
    }
$possible_url = array("changepass", "signup","vInfo");
if (isset($_POST["action"]) && in_array($_POST["action"], $possible_url)) 
{
    switch ($_POST["action"]) 
    {
	case "changepass":
            $status=changepasssword();
            break;
        case "signup":
            $status=signup();
            break;
        case "vInfo":
            break;
    }
    echo $status;
}
    
?>		
