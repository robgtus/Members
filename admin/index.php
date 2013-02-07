<? 
session_start();
include_once"../config.php";
$query = "SELECT COUNT(username) FROM members";  
$result = mysql_query($query) or die(mysql_error()); 
foreach(mysql_fetch_array($result) as $totalusers);



$query5 = "SELECT id, username, email FROM members ORDER BY id DESC LIMIT 10";  
$result5 = mysql_query($query5) or die(mysql_error()); 
$num2=mysql_num_rows($result5);

if(isset($_POST['updated'])){
$username1 = $_POST['username1'];
$check_if_userexists = mysql_query("SELECT * FROM `members` WHERE `username` = '$username1'");   
if(mysql_num_rows($check_if_userexists) == 0){
$error_output.="Username does not exist"; }
}

if(isset($_POST['checkinfo'])){
$username2 = $_POST['username2'];
$check_if_userexists2 = mysql_query("SELECT * FROM `members` WHERE `username` = '$username2'");   
if(mysql_num_rows($check_if_userexists2) == 0){
$error_output2.="Username does not exist"; }
else {
$showinfo=1;
$getuserinfo = mysql_query("SELECT username, email, points, completed_surveys, referral_ID FROM `members` WHERE username='$username2'") or die(mysql_error());
$output_username=mysql_result($getuserinfo,0,"username");
$output_email=mysql_result($getuserinfo,0,"email");
}}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $description ?>" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../style.css" type="text/css" />
</head>

<body>
<div id="wrapper">
    <div id="header">

        <div id="logo">
        </div>
        <div id="updates">
        <span>&nbsp;</span>
        </div>
        <div id="login">
        <div id="loginwelcome">
			<table>
			   <tr>
			   	   <td>
					  ADMIN AREA
				   </td>
				   </tr>
				   
		</table>
		</div>
            
        </div>

         
    <div id="content">
         <span>
		<table width="200">
        <tr><td colspan="2" align="center">Last 10 registered users</td></tr>
        <tr><td align="left"><b>Username<b></td><td align="left">Email</td></tr>
        <?php $j=0;
        if ($num2 >0){
while ($j < $num2) {
$username2=mysql_result($result5,$j,"username");
$email2=mysql_result($result5,$j,"email");
$j++;
echo "<tr><td>".$username2."</td><td>".$email2."</td></tr>"; 

		}
		}
		
		?>
	
		</table>
		</span>
	 	
     <h2>Stats</h2><br>	
        <p>
        Total users: <?php echo $totalusers ?><br>
        </p>
        
        <h2>Check User Info</h2><br>
 <form action="#" method="POST">
                <p>
                <input name="username2" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ''; }"/>
                <input type="submit" name="checkinfo" class="submit" value="Get Info" tabindex="3" />
                <br><font color="red"><?php echo $error_output2?></font><br>
                </p>
                
     </form>
     <?php if($showinfo==1){?>
     <p>
     <table width="500">
     <tr><td align="left"><b>Username</b></td><td align="left"><b>Email</b></td><td align="left"></td><td align="left"></td><td align="left"></td></tr>
     <tr><td><?php echo $output_username?></td><td><?php echo $output_email?></td><td></td><td></td><td></td></tr></table>
	<?php } ?>
</p>            
	
</p><br><br><br>
   
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>		
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>
<p><br>&nbsp;<br></p>

    </div>
<?php include("../footer.php");?>