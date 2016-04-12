<?php
session_start(); // Starting Session
if($_SESSION['regErr'])
{
	$regErr = $_SESSION['regErr'];
	//destroy this immediately before bad things happen
	unset($_SESSION['regErr']);
}

if(empty($_SESSION['login_user']))
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
Update Personal Information|Book Rental Service
</title>
<body>

<?php
 	require 'navigation.php';
?>
<div class="infoContainer">

<h1 align="center">Update Personal Information</h1>

<form action="updateCustomer2.php" method="post">
<br>
<?php
if(!$regErr)
{
	$username = 'group7';
	$password = 'zpakwn';
	
	$conn = mysql_connect('17carson.cs.uleth.ca',$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 

	$sql = "select password, address, phone_number, e_mail, full_name from users where user_name='$_SESSION[login_user]'"; 
	$result = mysql_query($sql,$conn);
	$val = mysql_fetch_row($result);
}

echo '<div class="infoDialog">';

echo 'Password: <input type="password" name="updatePass"';
if($regErr)
{
	if(!$regErr['updatePass'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updatePass]\"";
}
else
{
	echo " value=\"$val[0]\"";
}
echo '><br>';
echo 'Full Name: <input type="text" name="updateName"';
if($regErr)
{
	if(!$regErr['updateName'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updateName]\"";
}
else
{
	echo " value=\"$val[4]\"";
}
echo '><br>';
echo 'Email: <input type="text" name="updateEmail"';
if($regErr)
{
	if(!$regErr['updateEmail'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updateEmail]\"";
}
else
{
	echo " value=\"$val[3]\"";
}
echo '><br>';
echo 'Address: <input type="text" name="updateAdd"';
if($regErr)
{
	if(!$regErr['updateAdd'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updateAdd]\"";
}
else
{
	echo " value=\"$val[1]\"";
}
echo '><br>';
echo 'Phone Number: <input type="text" name="updatePhone"';
if($regErr)
{
	if(!$regErr['updatePhone'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updatePhone]\"";
}
else
{
	echo " value=\"$val[2]\"";
}
echo '></div>';
echo '<br>';
?>
<input type="submit" value="Submit" class="padding">
</form>
</div>
</div>
</body>
</html>
