<?php
	session_start(); // Starting Session

	if(empty($_SESSION['login_user']))
	{
		header('location: index.php');
		die();
	}

	$username = 'group7';
	$password = 'zpakwn';
	$_SESSION['regErr'] = array();
	
	if(empty($_POST['updatePass']))
	{
		$_SESSION['regErr']['updatePass'] = False;
		$kill = True;	
	}
	else
	{
		$_SESSION['regErr']['updatePass'] = $_POST['updatePass'];
	}
	
	if(empty($_POST['updateName']))
	{
		$_SESSION['regErr']['updateName'] = False;
		$kill = True;
	}
	else
	{
		$_SESSION['regErr']['updateName'] = $_POST['updateName'];
	}
	
	if(empty($_POST['updateAdd']))
	{
		$_SESSION['regErr']['updateAdd'] = False;
		$kill = True;
	}
	else
	{
		$_SESSION['regErr']['updateAdd'] = $_POST['updateAdd'];
	}
	
	if(empty($_POST['updatePhone']))
	{
		$_SESSION['regErr']['updatePhone'] = False;
		$kill = True;	
	}
	else
	{
		$_SESSION['regErr']['updatePhone'] = $_POST['updatePhone'];
	}
	
	if(empty($_POST['updateEmail']))
	{
		$_SESSION['regErr']['updateEmail'] = False;
		$kill = True;	
	}
	else
	{
		$_SESSION['regErr']['updateEmail'] = $_POST['updateEmail'];
	}
	
	if($kill)
	{
		header('location: updateCustomer.php');
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
	
	$userName = mysql_escape_string($_SESSION['login_user']);
	$password = mysql_escape_string($_POST['updatePass']);
	$address = mysql_escape_string($_POST['updateAdd']);
	$phoneNumber = mysql_escape_string($_POST['updatePhone']);
	$email = mysql_escape_string($_POST['updateEmail']);
	$fullName = mysql_escape_string($_POST['updateName']);

	$conn->beginTransaction();
	$conn->exec("update users set password='$password', address='$address', phone_number='$phoneNumber', e_mail='$email', full_name='$fullName' where user_name='$userName'");
	$conn->commit();
	
	echo "<h3>Details updated successfully.</h3>";
	header( "refresh:3;url=updateCustomer.php" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
