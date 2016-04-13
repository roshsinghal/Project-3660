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
	$conn->exec("insert into inactive_copies (book_id, copy_id, bcondition) values ('$_POST[bookID]','$_POST[copyID]','$_POST[reason]')");
	$conn->exec("delete from book_availability where book_id='$_POST[bookID]' and copy_id='$_POST[copyID]'");
	$conn->exec("update book_details set no_of_copies=no_of_copies-1, number_available=number_available-1 where book_id='$_POST[bookID]'");
	$conn->commit();
	//echo "insert into inactive_copies (book_id, copy_id, bcondition) values ('$_POST[bookID]','$_POST[copyID]','$_POST[reason]')<br>";
	//echo "delete from book_availability where book_id='$_POST[bookID]' and copy_id='$_POST[copyID]'";
	
	echo "<h3>Copy ";
	echo ($_POST["copyID"]);
	echo " deleted!</h3>";
	header( "refresh:3;url=$_POST[lastPage]" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
