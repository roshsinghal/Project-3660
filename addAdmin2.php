<?php
session_start(); // Starting Session

	$username = 'group7';
	$password = 'zpakwn';
	$_SESSION['regErr'] = array();
	
	if(empty($_POST['userName']))
	{
		$_SESSION['regErr']['userName'] = False;
		$kill = True;	
	}
	else
	{
		$_SESSION['regErr']['userName'] = $_POST['userName'];
	}
	
	if(empty($_POST['password']))
	{
		$_SESSION['regErr']['password'] = False;
		$kill = True;
	}
	else
	{
		$_SESSION['regErr']['password'] = $_POST['password'];
	}
	
	if(empty($_POST['address']))
	{
		$_SESSION['regErr']['address'] = False;
		$kill = True;
	}
	else
	{
		$_SESSION['regErr']['address'] = $_POST['address'];
	}
	
	if(empty($_POST['phoneNumber']))
	{
		$_SESSION['regErr']['phoneNumber'] = False;
		$kill = True;	
	}
	else
	{
		$_SESSION['regErr']['phoneNumber'] = $_POST['phoneNumber'];
	}
	
	if(empty($_POST['email']))
	{
		$_SESSION['regErr']['email'] = False;
		$kill = True;	
	}
	else
	{
		$_SESSION['regErr']['email'] = $_POST['email'];
	}
	
	if(empty($_POST['fullName']))
	{
		$_SESSION['regErr']['fullName'] = False;
		$kill = True;
	}
	else
	{
		$_SESSION['regErr']['fullName'] = $_POST['fullName'];
	}
	
	
	if($kill)
	{
		header('location: register.php');
		die();
	}
	else
	{
		unset($_SESSION['regErr']);
	}

try{
	$conn = new PDO('mysql:host=17carson.cs.uleth.ca;dbname=group7',$username,$password);
} catch (Exception $e) {
    die("Unable to connect: " . $e->getMessage());
}
try {
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$_POST['userName'] = mysql_escape_string($_POST['userName']);
	$_POST['password'] = mysql_escape_string($_POST['password']);
	$_POST['address'] = mysql_escape_string($_POST['address']);
	$_POST['phoneNumber'] = mysql_escape_string($_POST['phoneNumber']);
	$_POST['email'] = mysql_escape_string($_POST['email']);
	$_POST['fullName'] = mysql_escape_string($_POST['fullName']);

	$conn->beginTransaction();
	$conn->exec("insert into users (user_name, password, address, phone_number, e_mail, full_name, is_admin) values ('$_POST[userName]','$_POST[password]','$_POST[address]','$_POST[phoneNumber]','$_POST[email]', '$_POST[fullName]', 1)");
	$conn->commit();
	
	echo "<h3>Admin ";
	echo ($_POST["userName"]);
	echo " added!</h3>";
	header( "refresh:3;url=index.php" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getCode();
}
?>
