<?php 
include_once"config.php";
if(isset($_POST['register'])){
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$points = $bonuspoints;
$memip = $_SERVER['REMOTE_ADDR'];
$completed_surveys=0;
if(isset($_GET['join'])){
	$referral_ID = $_GET['join'];}
$date = date("d-m-Y");
if($username == NULL OR $password == NULL OR $email == NULL){
$final_report2.= " - Please complete all fields";
}else{
if(strlen($username) <= 1 || strlen($username) >= 30){
$final_report2.=" - Your username must be between 1 and 30 chars";
}else{
$check_members = mysql_query("SELECT * FROM `members` WHERE `username` = '$username'");   
if(mysql_num_rows($check_members) != 0){
$final_report2.=" - The username is already in use!";  
}else{ 
if(strlen($password) <= 2 || strlen($password) >= 20){
$final_report2.=" - Your password must be between 2 and 20 characters";
}else{
$create_member = mysql_query("INSERT INTO `members` (`id`,`username`, `password`, `email`, `points`,`completed_surveys`,`referral_ID`, `ip`, `date`) 
VALUES('','$username','$password','$email','$points', '$completed_surveys','$referral_ID', '$memip','$date')"); 
$final_report2.="<meta http-equiv='Refresh' content='0; URL=login.php'/>"; 
}}}}}
?>
<?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){
	header("Location: members.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $description ?>" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<div id="wrapper">
    <div id="header">

        <a href="index.php">
        <div id="logo">
        </div></a>
        <div id="updates">
        <span>&nbsp;</span>
        </div>
        <div id="login">
        <div id="loginwelcome">Welcome Guest, not a member? <a href="register.php<?php echo $referral_string?>"><b>Register Now!</b></a></div>

            <form action="#">
                <p>
                <input title="username" name="username" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ''; }"/>
                <input name="password" type="password" class="password" title="password" value="Password" onclick="if ( value == 'Password' ) { value = ''; }"/>
                <input type="submit" name="Login" class="submit" value="login" tabindex="3" />
                </p>
            </form>
            
            <br><br>
            
        </div>

           <ul id="navigation">
		    	<li><a href="index.php<?php echo $referral_string?>">Home</a></li>
  			    <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
  			    <li><a href="members.php">Members</a></li>
  			    <?php } ?>
                <li><a href="terms.php">Terms</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                 <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
  			    <li><a href="logout.php">Logout</a></li>
  			    <?php } ?>
            </ul>
            
    <div id="content">
    
     <h2>Register <?php if($final_report2 !=""){?>
			<font color="red"><? echo $final_report2;?></font>
			<?php } ?></h2><br>
     <p>
     
	    <div style="width:40%;vertical-align:top;text-align:left;overflow:visible;" id="regpage">
<form action="" method="post">
<fieldset style="border:none;">
<p><label for="username" style="font-weight:normal;width:30%;float:left;display:block;">username:</label> <input type="text" name="username" class="item" value="" /></p><br>
<p><label for="password" style="font-weight:normal;width:30%;float:left;display:block;">password:</label> <input type="password" name="password" class="item" value="" /></p><br>
<p><label for="email" style="font-weight:normal;width:30%;float:left;display:block;">email:</label> <input type="text" name="email" class="item" value="" /></p><br>
<p><input type="submit" name="register" value="Register" id="register" style="float:left;border:1px solid #999;background:#E4E4E4;margin-top:5px;" /></p>
</fieldset>
</form>
</div> 	 
	 </p>
     
        
<br>

    </div>
<?php include("footer.php");?>