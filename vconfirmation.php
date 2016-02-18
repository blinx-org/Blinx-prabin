<html>
<body>
<?php
include 'dbconnection.php';
$dbHelper=new DB();
if(isset($_GET['id']) && isset($_GET['confirmation_code']) && isset($_GET['email']))
{
$id=$_GET['id'];
$code=$_GET['confirmation_code'];
$email=$_GET['email'];
$query=mysql_query("select * from m_volunteer where volunteer_id='$id' AND email_id='$email' AND confirmcode='$code' ");
$row=mysql_num_rows($query);
if($row == 1)
{
$query1=mysql_query("update m_volunteer set verified='1' where volunteer_id='$id' AND email_id='$email' AND confirmcode='$code'");
if($query1)
{
echo "You have verified your mail ID";
}
}
}
?>
</body>
</html>
