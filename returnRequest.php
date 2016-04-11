<?php
	session_start();
	//$_SESSION['login_user'] = userid

	$username = 'group7';
	$password = 'zpakwn';

try{
	$conn = new PDO('mysql:host=17carson.cs.uleth.ca;dbname=group7',$username,$password);
} catch (Exception $e) {
    die("Unable to connect: " . $e->getMessage());
}
try {
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conn->beginTransaction();
	$conn->exec("update orders set delivered=1 where order_id='$_POST[orderID]'");
	$conn->commit();

	
	echo "<h3>Book return requested.</h3>";
	header( "refresh:3;url=showOrders.php" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
