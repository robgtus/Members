<? 
session_start();
include_once"config.php";
if(isset($_POST['login'])){
$username= trim($_POST['username']);
$password = trim($_POST['password']);
if($username == NULL OR $password == NULL){
$final_report.="Please complete both fields";
}else{
$check_user_data = mysql_query("SELECT * FROM `members` WHERE `username` = '$username'") or die(mysql_error());
if(mysql_num_rows($check_user_data) == 0){
$final_report.="This username does not exist";
}else{
$get_user_data = mysql_fetch_array($check_user_data);
if($get_user_data['password'] == $password){
$start_idsess = $_SESSION['username'] = "".$get_user_data['username']."";
$start_passsess = $_SESSION['password'] = "".$get_user_data['password']."";
$final_report.="<meta http-equiv='Refresh' content='0; URL=members.php'/>";
}}}}
	 if(isset($_SESSION['username']) && isset($_SESSION['password'])){ 
	header("Location: members.php");
	}
	
?> 


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title><?php echo $title ?></title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="<?php echo $description ?>" />
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
         <div id="loginwelcome">
        
		<?php if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){  ?>
			<?php if($final_report !=""){?>
			<font color="red"><? echo $final_report;?></font>
			<?php }else { ?>Welcome Guest, not a member? <a href="register.php<?php echo $referral_string?>"><b>Register Now!</b></a> <?php } ?> 
			   
			   </div>
			   <form action="" method="post">
                <p>
                <input type="text" title="username" name="username" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ''; }"/>
                <input name="password" type="password" class="password" title="password" value="Password" onclick="if ( value == 'Password' ) { value = ''; }"/>
                <input type="Submit" name="login" class="submit" value="login" tabindex="3" />
                </p>
            </form>	
            </div>
			<?php } ?>
			
		<?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
		<table>
			   <tr>
			   	   <td>
					  Welcome <b><?php echo $membername ?></b>
				   </td>
				   </tr>
				   <tr>
				   <td align="right" width="310">
				   </td>
				</tr>
		</table>
		</div>
		</div>
		<?php } ?>

            <ul id="navigation">
		    	<li class="on"><a href="index.php">Home</a></li>
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
   
        <br/>
        <br/>
        <br/>
    </div>
    
<?php include("footer.php");?>