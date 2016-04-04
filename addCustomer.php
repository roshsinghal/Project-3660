<?php
	$username = 'group7';
	$password = 'zpakwn';
	
	if(empty($_POST['userName']))
	{
		$_SESSION['regErr']['userName'] = True;
		$kill = True;	
	}
	if(empty($_POST['password']))
	{
		$_SESSION['regErr']['password'] = True;
		$kill = True;
	}
	if(empty($_POST['address']))
	{
		$_SESSION['regErr']['address'] = True;
		$kill = True;
	}
	if(empty($_POST['phoneNumber']))
	{
		$_SESSION['regErr']['phoneNumber'] = True;
		$kill = True;	
	}
	if(empty($_POST['email']))
	{
		$_SESSION['regErr']['email'] = True;
		$kill = True;	
	}
	if(empty($_POST['fullName']))
	{
		$_SESSION['regErr']['fullName'] = True;
		$kill = True;
	}
	
	
	if($kill)
	{
		header('location: register.php');
	}

try{
	$conn = new PDO('mysql:host=17carson.cs.uleth.ca;dbname=group7',$username,$password);
} catch (Exception $e) {
    die("Unable to connect: " . $e->getMessage());
}
try {
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conn->beginTransaction();;
	$conn->exec("insert into users (user_name, password, address, phone_number, e_mail, full_name) values ('$_POST[userName]','$_POST[password]','$_POST[address]','$_POST[phoneNumber]','$_POST[email]', '$_POST[fullName]')");
	$conn->commit();
	
	echo "<h3>User ";
	echo ($_POST["userName"]);
	echo " registered!</h3>";
	header('location: index.php');

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
