<? 
//Session start
session_start();

//Includes
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

  			    <li><a href="index.php">Home</a></li>
  			    <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
  			    <li><a href="members.php">Members</a></li>
  			    <?php } ?>
                <li><a href="terms.php">Terms</a></li>
                <li><a href="help.php">Help</a></li>
                <li class="on"><a href="contact.php">Contact Us</a></li>
                  <?php if(isset($_SESSION['username']) && isset($_SESSION['password'])){  ?>	
  			    <li><a href="logout.php">Logout</a></li>
  			    <?php } ?>

            </ul>
    <div id="content">
    
   <h2>Contact Us</h2>
        <p>
        <br>
         If you need any help, please don't hesitate to get in touch.<br><br>
        <?php 
    $to = $contactemail;

/* From email address, in case your server prohibits sending emails from addresses other than those of your 
own domain (e.g. email@yourdomain.com). If this is used then all email messages from your contact form will appear 
from this address instead of actual sender. */

$from = '';

/* This will be appended to the subject of contact form message */
$subject_prefix = 'Contact Form';

/* Security question and answer array */
$question_answers = array (
'The Moon is red or white' => 'white',
'The Sun is blue or yellow' => 'yellow',
'Fire is hot or cold' => 'hot',
'Icecream is hot or cold' => 'cold'
);


/* Form width in px or % value */
$form_width = '70%';

/* Form background color */
$form_background = '#F7F8F7';

/* Form border color */
$form_border = '#9bb50b';

/* Form border style. Examples - dotted, dashed, solid, double */
$form_border_style = 'solid';

/* Empty/Invalid fields will be highlighted in this color */
$field_error_color = '#FF0000';

/* Thank you message to be displayed after the form is submitted. Can include HTML tags. Write your message 
between <!-- Start message --> and <!-- End message --> */
$thank_you_message = <<<EOD
<!-- Start message -->
<p>We have received your message. If required, we'll get back to you as soon as possible.</p><br /><br /><br /><br /><br /><br /><br /><br />
<!-- End message -->
EOD;

/* URL to be redirected to after the form is submitted. If this is specified, then the above message will 
not be shown and user will be redirected to this page after the form is submitted */
/* Example: $thank_you_url = 'http://www.yourwebsite.com/thank_you.html'; */

$thank_you_url = 'thanks_contact.php';

/*******************************************************************************
 *	Do not change anything below, unless of course you know very well 
 *	what you are doing :)
*******************************************************************************/

$name = array('Name','name',NULL,NULL);
$email = array('Email','email',NULL,NULL,NULL);
$subject = array('Subject','subject',NULL,NULL);
$message = array('Message','message',NULL,NULL);
$security = array('Security question','security',NULL,NULL,NULL);
$yourusername = $membername;

$error_message = '';

if (!isset($_POST['submit'])) {

  showForm();

} else { //form submitted

  $error = 0;
  
  if(!empty($_POST['check'])) die("Invalid form access");
  
  if(!empty($_POST['name'])) {
  	$name[2] = clean_var($_POST['name']);
  	if (function_exists('htmlspecialchars')) $name[2] = htmlspecialchars($name[2], ENT_QUOTES);
  }
  else {
    $error = 1;
    $name[3] = 'color:#FF0000;';
  }
  
  if(!empty($_POST['email'])) {
  	$email[2] = clean_var($_POST['email']);
  	if (!validEmail($email[2])) {
  	  $error = 1;
  	  $email[3] = 'color:#FF0000;';
  	  $email[4] = '<strong><span style="color:#FF0000;">Invalid email</span></strong>';
	  }
  }
  else {
    $error = 1;
    $email[3] = 'color:#FF0000;';
  }
  
  if(!empty($_POST['subject'])) {
  	$subject[2] = clean_var($_POST['subject']);
  	if (function_exists('htmlspecialchars')) $subject[2] = htmlspecialchars($subject[2], ENT_QUOTES);  	
  }
  else {
  	$error = 1;
    $subject[3] = 'color:#FF0000;';
  }  

  if(!empty($_POST['message'])) {
  	$message[2] = clean_var($_POST['message']);
  	if (function_exists('htmlspecialchars')) $message[2] = htmlspecialchars($message[2], ENT_QUOTES);
  }
  else {
    $error = 1;
    $message[3] = 'color:#FF0000;';
  }    

  if(empty($_POST['security'])) {
    $error = 1;
    $security[3] = 'color:#FF0000;';
  } else {
  	
    if($question_answers[$_POST['question']] != strtolower(clean_var($_POST['security']))) {
      $error = 1;
      $security[3] = 'color:#FF0000;';   
      $security[4] = '<strong><span style="color:#FF0000;">Wrong answer</span></strong>';
    }
  }

  if ($error == 1) {
    $error_message = '<span style="font-weight:bold;font-size:90%;">Please correct/enter field(s) in red.</span>';

    showForm();

  } else {
  	
  	if (function_exists('htmlspecialchars_decode')) $name[2] = htmlspecialchars_decode($name[2], ENT_QUOTES);
  	if (function_exists('htmlspecialchars_decode')) $subject[2] = htmlspecialchars_decode($subject[2], ENT_QUOTES);
  	if (function_exists('htmlspecialchars_decode')) $message[2] = htmlspecialchars_decode($message[2], ENT_QUOTES);  	
  	
    $message = "Username:$membername\r\nName:$name[2]\r\nEmail:$email[2]\r\n\r\nMessage:\r\n$message[2]\r\n";
    
    if (!$from) $from_value = $email[2];
    else $from_value = $from;
    
    $headers = "From: $from_value" . "\r\n" . "Reply-To: $email[2]";
    
    mail($to,"$subject_prefix - $subject[2]", $message, $headers);
    
    if (!$thank_you_url) {
    
      
      echo $GLOBALS['thank_you_message'];
      echo "\n";
      
	  }
	  else {
	  	header("Location: $thank_you_url");
	  }
       	
  }

} //else submitted



function showForm()

{
global $name, $email, $subject, $message, $security, $question_answers, $form_width, $form_background, $form_border, $form_border_style; 	
$question = array_rand($question_answers);
echo $GLOBALS['error_message'];  
echo <<<EOD
<div style="width:{$form_width};vertical-align:top;text-align:left;background-color:{$form_background};border: 1px {$form_border} {$form_border_style};overflow:visible;" id="formContainer">
<form method="post" class="contactForm">
<fieldset style="border:none;">
<p><label for="{$name[1]}" style="font-weight:bold;{$name[3]};width:25%;float:left;display:block;">{$name[0]}</label> <input type="text" name="{$name[1]}" value="{$name[2]}" /></p>
<p><label for="{$email[1]}" style="font-weight:bold;{$email[3]}width:25%;float:left;display:block;">{$email[0]}</label> <input type="text" name="{$email[1]}" value="{$email[2]}" /> {$email[4]}</p>
<p><label for="{$subject[1]}" style="font-weight:bold;{$subject[3]}width:25%;float:left;display:block;">{$subject[0]}</label> <input type="text" name="{$subject[1]}" value="{$subject[2]}" /></p>
<p><label for="{$message[1]}" style="font-weight:bold;{$message[3]}width:25%;float:left;display:block;">{$message[0]}</label> <textarea name="{$message[1]}" cols="40" rows="6">{$message[2]}</textarea></p>
<p><label for="{$security[1]}" style="font-weight:bold;{$security[3]}width:25%;float:left;display:block;">{$question}?</label> <input type="text" name="{$security[1]}" value="" size="10" /> {$security[4]}</p>
<div style="margin-left:25%;display:block;font-size:90%;">We are sorry but please answer the above question to prove you are a real visitor and not a spam bot.</div>
<p><span style="font-weight:bold;font-size:90%;">All fields are required.</span></p>
<input type="hidden" name="question" value="{$question}">
<input type="hidden" name="check" value="">
<input type="submit" name="submit" value="Submit" style="border:1px solid #999;background:#E4E4E4;margin-top:5px;" />
</fieldset>
</form>
</div>
<br>
<div style="width:{$form_width};text-align:right;font-size:80%;">
</div> 
EOD;

}

function clean_var($variable) {
    $variable = strip_tags(stripslashes(trim(rtrim($variable))));
  return $variable;
}

/**
Email validation function. Thanks to http://www.linuxjournal.com/article/9585
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && function_exists('checkdnsrr'))
      {
      	if (!(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
         // domain not found in DNS
         $isValid = false;
       }
      }
   }
   return $isValid;
}

?>

            
	
	</div>
    
<?php include("footer.php");?>