<?php
session_start(); // Starting Session
if($_SESSION['regErr'])
{
	$regErr = $_SESSION['regErr'];
	//destroy this immediately before bad things happen
	unset($_SESSION['regErr']);
}

if(!empty($_SESSION['login_user']))
{
	header('location: index.php');
	die();
}
?>
<html>
<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Register|Book Rental Service
</title>
<body>

<?php
 require 'navigation.php';
?>

<h1 align="center">Register</h1>

<form action="addCustomer.php" method="post">
<br>
<?php
echo 'Username: <input type="text" name="userName"';
if($regErr)
{
	if(!$regErr['userName'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[userName]\"";
}
echo '><br>';
echo 'Password: <input type="text" name="password"';
if($regErr)
{
	if(!$regErr['password'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[password]\"";
}
echo '><br>';
echo 'Full Name: <input type="text" name="fullName"';
if($regErr)
{
	if(!$regErr['fullName'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[fullName]\"";
}
echo '><br>';
echo 'Email: <input type="text" name="email"';
if($regErr)
{
	if(!$regErr['email'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[email]\"";
}
echo '><br>';
echo 'Address: <input type="text" name="address"';
if($regErr)
{
	if(!$regErr['address'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[address]\"";
}
echo '><br>';
echo 'Phone Number: <input type="text" name="phoneNumber"';
if($regErr)
{
	if(!$regErr['phoneNumber'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[phoneNumber]\"";
}
echo '><br>';
?>
<input type="submit" value="Submit">
</form>
</div>
</body>
</html>
