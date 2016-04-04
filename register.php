<?php
session_start(); // Starting Session
if(isset($_SESSION['regErr']))
{
	$regErr = $_SESSION['regErr'];
	//destroy this immediately before bad things happen
	unset($_SESSION['regErr']);
}

if(!empty($_SESSION['login_user']))
{
	header('location: index.php');
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
echo 'Username: <input type="text" name="userName">';
if($regErr['userName'])
	echo ' <font color=red>* Cannot be empty!</font>';
echo '<br>';
echo 'Password: <input type="text" name="password">';
if($regErr['password'])
	echo ' <font color=red>* Cannot be empty!</font>';
echo '<br>';
echo 'Full Name: <input type="text" name="fullName">';
if($regErr['fullName'])
	echo ' <font color=red>* Cannot be empty!</font>';
echo '<br>';
echo 'Email: <input type="text" name="email">';
if($regErr['email'])
	echo ' <font color=red>* Cannot be empty!</font>';
echo '<br>';
echo 'Address: <input type="text" name="address">';
if($regErr['address'])
	echo ' <font color=red>* Cannot be empty!</font>';
echo '<br>';
echo 'Phone Number: <input type="text" name="phoneNumber">';
if($regErr['phoneNumber'])
	echo ' <font color=red>* Cannot be empty!</font>';
echo '<br>';
?>
<input type="submit" value="Submit">
</form>
</body>
</html>
