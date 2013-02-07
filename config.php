<?
//Start Session 
ob_start();session_start();

//Database Settings
$hostname = "localhost";  //localhost works with most hosts
$data_username = "YourDatabase_Name"; //database username
$data_password = "YourDatabase_Password"; //database password
$data_basename = "YourDatabase_Username"; //database name

//Do not change below
$conn = mysql_connect("".$hostname."","".$data_username."","".$data_password."");  
mysql_select_db("".$data_basename."") or die(mysql_error());  


$fetch_users_data = mysql_fetch_object(mysql_query("SELECT * FROM `members` WHERE username='".$_SESSION['username']."'"));

//Website Settings
$title= "My Membership Site";  //Site Title
$description = "My Site description"; //Site description
$yourdomain="http://www.YOURDOMAIN.com"; //domain name where script is installed
$contactemail = "YOUR_EMAIL_ADDRESS"; //contact form messages will be sent here
$requestemail = "THE_SAME_OR_ANOTHER_EMAIL_ADDRESS"; //request a voucher messages will be sent here


$membername= $fetch_users_data->username; //don't change
?>