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

<h1 align="center">Update Personal Information</h1>

<form action="updateCustomer2.php">
<br>
<?php
echo 'Password: <input type="text" name="updatePass"';
if($regErr)
{
	if(!$regErr['updatePass'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updatePass]\"";
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
echo '><br>';
echo 'Email: <input type="text" name="updateEmail"';
if($regErr)
{
	if(!$regErr['updateEmail'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updateEmail]\"";
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
echo '><br>';
echo 'Phone Number: <input type="text" name="updatePhoner"';
if($regErr)
{
	if(!$regErr['updatePhone'])
		echo '><font color=red>* Cannot be empty!</font';
	else
		echo " value=\"$regErr[updatePhone]\"";
}
echo '><br>';
?>
<input type="submit" value="Submit">

</form>
</body>
</html>
