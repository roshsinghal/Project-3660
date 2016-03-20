<?php
	$username = 'group7';
	$password = 'zpakwn';

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

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
