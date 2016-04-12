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
	$q = $conn->query("select copy_id from book_availability where book_id='$_POST[bookID]' and availability_status=1");
	$q->setFetchMode(PDO::FETCH_LAZY);
	$r = $q->fetch();
	$conn->exec("insert into orders (book_id,copy_id,date_rented,user_id) values('$_POST[bookID]','$r[0]', 	CURDATE(),'$_SESSION[login_user]')");
	$conn->exec("update book_availability set availability_status=0 where book_id='$_POST[bookID]' and copy_id='$r[0]'");
	$conn->exec("update book_details set number_available=number_available-1 where book_id='$_POST[bookID]'");
	$conn->commit();

	
	echo "<h3>Order successfully placed. The selected book is being shipped to your registered address.</h3>";
	header( "refresh:3;url=showOrders.php" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
