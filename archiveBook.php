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
	
	$_POST['bookID'] = mysql_escape_string($_POST['bookID']);

	$conn->beginTransaction();;
	$conn->exec("update book_details set archived=$_POST[archive] where book_id = '$$_POST[bookID]'");
	$conn->commit();
	
	echo "<h3>Book ";
	echo ($$_POST["bookID"]);
	echo " updated!</h3>";

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>