<?php 
session_start();
include_once"config.php";
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	header("Location: index.php");
}else{
$fetch_users_data = mysql_fetch_object(mysql_query("SELECT * FROM `members` WHERE username='".$_SESSION['username']."'"));
}
$ref_id=$fetch_users_data->id;
$query_refs = "SELECT COUNT(referral_ID) FROM members where referral_ID=".$ref_id."";  
$result_refs = mysql_query($query_refs) or die(mysql_error()); 
foreach(mysql_fetch_array($result_refs) as $total_referrals);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script type="text/javascript">var isloaded = false;</script><script type="text/javascript" src="http://www.cpalead.com/mygateway.php?pub=18204&amp;subid=<?php echo $membername ?>"></script><script type="text/javascript">if (!isloaded) { window.location = 'http://cpalead.com/adblock.php?pub=18204&amp;subid=<?php echo $membername ?>'; }</script><noscript><meta http-equiv="refresh" content="0;url=http://cpalead.com/nojava.php?pub=18204&amp;subid=<?php echo $membername ?>" /></noscript>

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
        <div id="loginwelcome">
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

         <ul id="navigation">
		    	<li><a href="index.php">Home</a></li>
  			    <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
  			    <li class="on"><a href="members.php">Members</a></li>
  			    <?php } ?>
                <li><a href="terms.php">Terms</a></li>
                <li><a href="help.php">Help</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                   <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
  			    <li><a href="logout.php">Logout</a></li>
  			    <?php } ?>
            </ul>
    <div id="content">
       <h2>Members Area</h2><br>	
    </div>
<?php include("footer.php");?>