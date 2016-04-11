<?php
	$username = 'group7';
	$password = 'zpakwn';
	if(empty($_POST['bookID']))
	{
		header('location: manageBook.php');
		die();
	}

try{
	$conn = new PDO('mysql:host=17carson.cs.uleth.ca;dbname=group7',$username,$password);
} catch (Exception $e) {
    die("Unable to connect: " . $e->getMessage());
}
try {
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$_POST['bookID'] = mysql_escape_string($_POST['bookID']);
	$_POST['title'] = mysql_escape_string($_POST['title']);
	$_POST['isbn'] = mysql_escape_string($_POST['isbn']);
	$_POST['publisher'] = mysql_escape_string($_POST['publisher']);
	$_POST['author'] = mysql_escape_string($_POST['author']);

	$conn->beginTransaction();;
	$conn->exec("insert into book_details (book_id, archived, title, isbn, publisher, author) values ('$_POST[bookID]',0,'$_POST[title]','$_POST[isbn]', '$_POST[publisher]', '$_POST[author]')");
	$conn->commit();
	
	echo "<h3>Book ";
	echo ($_POST["bookID"]);
	echo " inserted!</h3>";
	header( "refresh:3;url=manageBook.php" );

} catch (Exception $e) {
  $conn->rollBack();
  echo "Failed: " . $e->getMessage();
}
?>
