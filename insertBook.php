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
	$conn->exec("insert into book_details (book_id, archived, title, isbn, publisher, author) values ('$_POST[bookID]','$_POST[archived]','$_POST[title]','$_POST[isbn]', '$_POST[publisher]', '$_POST[author]')");
	$conn->commit();
	
	echo "<h3>Book ";
	echo ($_POST["bookID"]);
	echo " inserted!</h3>";

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
