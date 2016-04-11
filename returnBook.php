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
	$q = $conn->query("select book_id, copy_id from orders where order_id='$_POST[orderID]'");
	$q->setFetchMode(PDO::FETCH_LAZY);
	$r = $q->fetch();
	$conn->exec("update orders set returned=1, date_returned=CURDATE(), return_id=$_SESSION[login_user] where order_id='$_POST[orderID]'");
	$conn->exec("update book_availability set availability_status=1 where book_id='$r[0]' and copy_id='$r[1]'");
	$conn->exec("update book_details set number_available=number_available+1 where book_id='$r[0]'");
	$conn->commit();

	
	echo "<h3>Book returned.</h3>";
	header( "refresh:3;url=pendingReturns.php" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
