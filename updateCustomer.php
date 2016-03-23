<?php
session_start(); // Starting Session

if(empty($_SESSION['login_user']))
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
Update Personal Information|Book Rental Service
</title>
<body>

<?php
 	require 'navigation.php';
?>

<h1 align="center">Update Personal Information</h1>

<form action="updateCustomer.asp">
<br>
Password: <input type="text" name="updatePass"><br>
Full Name: <input type="text" name="updateName"><br>
Address: <input type="text" name="updateAdd"><br>
Phone Number: <input type="text" name="updatePhone"><br>
<input type="submit" value="Submit">

</form>
</body>
</html>
