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
	$conn->exec("insert into inactive_copies (book_id, copy_id, bcondition) values ('$_REQUEST[bookID]','$_REQUEST[copyID]','$_REQUEST[reason]')");
	$conn->exec("delete from book_availability where book_id='$_REQUEST[bookID]' and copy_id='$_REQUEST[copyID]'");
	$conn->commit();
	//echo "insert into inactive_copies (book_id, copy_id, bcondition) values ('$_REQUEST[bookID]','$_REQUEST[copyID]','$_REQUEST[reason]')<br>";
	//echo "delete from book_availability where book_id='$_REQUEST[bookID]' and copy_id='$_REQUEST[copyID]'";
	
	echo "<h3>Copy ";
	echo ($_REQUEST["copyID"]);
	echo " deleted!</h3>";

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
