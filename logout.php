<? 
//Logout script
session_start();
include_once"config.php";;
session_unset('username');
session_unset('password');
echo "<meta http-equiv='Refresh' content='0; URL=index.php'/>";
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> </title>
</head>

<body>
&nbsp;
</body>
</html>
