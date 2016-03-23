<?php
session_start(); // Starting Session
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
Username: <input type="text" name="userName"><br>
Password: <input type="text" name="password"><br>
Full Name: <input type="text" name="fullName"><br>
Email: <input type="text" name="email"><br>
Address: <input type="text" name="address"><br>
Phone Number: <input type="text" name="phoneNumber"><br>
<input type="submit" value="Submit">
</form>
</body>
</html>
