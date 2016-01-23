<?php
date_default_timezone_set('Asia/Kolkata');
// Starting Session
$username = isset($_POST["username"])?$_POST["username"]:'';
$password = isset($_POST["password"])?$_POST["password"]:'';
$login = isset($_POST["signin"])?$_POST["signin"]:'';
$DbStatus='';
$status=$login;
if($login=="Login")
{
  $data['Status'] = array(
          array("DBStatus" => "2", "Message" => "Values are Empty")
              );
  $DbStatus=$data['Status'];
  if($username=='' && $password=='' )
  {
      foreach($DbStatus as $key=>$bal) 
          {
                $DbStatus[$key]['DBStatus']="2";
                $DbStatus[$key]['Message']="Username and Passowrd are empty";
          }
  }
  else
  {
      include 'dbconnection.php';
      $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
      //$status=preg_match('/^[0-9]+$/',$username);
      if(preg_match('/^[0-9]+$/',$username))
      {
        $sql1="select count(*) as count from m_volunteer where mobile_number='".$username."'"; 
        //$sql1="select count(*) as count from f_help"; 
      }
      else
      {
        $sql1="select count(*) as count from m_volunteer where email_id='".$username."'"; 
      }
      $result = mysqli_query($conn, $sql1);
      if (!$result) 
      {
        $status=$host. $user. $pass. $database;
          foreach($DbStatus as $key=>$bal) 
          {
                $DbStatus[$key]['DBStatus']="0";
                $DbStatus[$key]['Message']="Failed to Run".$sql1;
          }
      }
      else
      {
          $count = mysqli_fetch_object($result)->count; 
          if(intval($count)>=1)
          {
                if(preg_match('/^[0-9]+$/',$username))
                {
                  $sql2="select count(*) as count from m_volunteer where mobile_number='".$username."' and pwd='".$password."'";  
                  $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$username."'";
                }
                else
                {
                  $sql2="select count(*) as count from m_volunteer where email_id='".$username."' and pwd='".$password."'";   
                  $query = "SELECT * FROM  m_volunteer v where v.email_id = '".$username."'";
                }
                $result1=mysqli_query($conn,$sql2);
                if (!$result1) 
                {
                        foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']="Failed to Run".$sql2;
                      }
                } 
                else
                {
                    $value = mysqli_fetch_object($result1)->count; 
                    if(intval($value)==1)
                    {
                        session_start();
                        $result2=mysqli_query($conn,$query);
                        $data = array();
                        while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
                        {
                            array_push($data, $row);
                        }
                        $_SESSION['vid']=$data[0]['volunteer_id'];
                        $_SESSION['email']=$data[0]['email_id'];
                        $_SESSION['mobile']=$data[0]['mobile_number'];
                        $_SESSION['name']=$data[0]['first_name'];
                        foreach($DbStatus as $key=>$bal) 
                        {
                            $DbStatus[$key]['DBStatus']="1";
                            $DbStatus[$key]['Message']=$password;
                            header("Location: ./index.php");
                        }
                    }
                    else 
                    {
                           foreach($DbStatus as $key=>$bal) {
                        $DbStatus[$key]['DBStatus']="2";
                        //$DbStatus[$key]['Message']="Invalid Credentials"."BBB";
                        $DbStatus[$key]['Message']="Invalid Credentials";
                          } 
                    }
                }
          }
          else
          {
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="2";
                    $DbStatus[$key]['Message']="User Does not Exist";
                      }
          }

      } 
      mysqli_close($conn);
  }
  $status=$DbStatus;
  //$status;
}
else
{
  $status='';
}
?>		
