<?php
include '../tags/common/scripts.php';

date_default_timezone_set('Asia/Kolkata');
// Starting Session
$username = isset($_POST["username"])?$_POST["username"]:'';
$password = isset($_POST["password"])?$_POST["password"]:'';
$login = isset($_POST["signin"])?$_POST["signin"]:'';
$DbStatus='';
$status=$login;
if($login=="Login")
{
  include 'dbconnection.php';
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
      $dbHelper=new DB();
      //$conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
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
      //$result = mysqli_query($conn, $sql1);
	  $result=$dbHelper->runQuery($sql1);
      if (is_array($result)&&count($result)<=0) 
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
		  $count=count($result);
          if(intval($count)>=1)
          {
                if(preg_match('/^[0-9]+$/',$username))
                {
                  $sql2="select count(*) as count from m_volunteer where mobile_number='".$username."' and pwd='".$password."'";  
                  $query2 = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$username."'";
                }
                else
                {
                  $sql2="select count(*) as count from m_volunteer where email_id='".$username."' and pwd='".$password."'";   
                  $query2 = "SELECT * FROM  m_volunteer v where v.email_id = '".$username."'";
                }
				$result1=$dbHelper->runQuery($sql2);
                //$result1=mysqli_query($conn,$sql2);
                if (is_array($result1)&&count($result1)<=0) 
                {
                        foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']="Failed to Run".$sql2;
                      }
                } 
                else
                {
                    $value = $result1[0]['count']; 
                    if(intval($value)==1)
                    {
                        session_start();
                        $result2=$dbHelper->runQuery($query2);;
                        $data = $result2;
                        /*while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
                        {
                            array_push($data, $row);
                        }*/
                        $_SESSION['vid']=$data[0]['volunteer_id'];
                        $_SESSION['email']=$data[0]['email_id'];
                        $_SESSION['mobile']=$data[0]['mobile_number'];
                        $_SESSION['name']=$data[0]['first_name'];
                        foreach($DbStatus as $key=>$bal) 
                        {
                            $DbStatus[$key]['DBStatus']="1";
                            $DbStatus[$key]['Message']="";
                            header("Location: ./index.php");
                        }
                    }
                    else 
                    {
                           foreach($DbStatus as $key=>$bal) {
                        $DbStatus[$key]['DBStatus']="2";
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
function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
}
?>	