<?php
	$username = 'group7';
	$password = 'zpakwn';
	if(empty($_POST['bookID']))
	{
		header('location: copyID.php');
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
	$_POST['copyID'] = mysql_escape_string($_POST['copyID']);

	$conn->beginTransaction();;
	$conn->exec("insert into book_availability (copy_id,book_id,availability_status) values ('$_POST[copyID]','$_POST[bookID]',1)");
	$conn->exec("update book_details set no_of_copies=no_of_copies+1, number_available=number_available+1 where book_id='$_POST[bookID]'");
	$conn->commit();
	//echo "insert into inactive_copies (book_id, copy_id, bcondition) values ('$_POST[bookID]','$_POST[copyID]','$_POST[reason]')<br>";
	//echo "delete from book_availability where book_id='$_POST[bookID]' and copy_id='$_POST[copyID]'";
	
	echo "<h3>Copy ";
	echo ($_POST["copyID"]);
	echo " added successfully!</h3>";
	header( "refresh:3;url=$_POST[lastPage]" );

} catch (Exception $e) {
  $conn->rollBack();
  if($e->getCode() == 23000)
	{
		echo "CopyIDs must be unique.";
		header( "refresh:3;url=$_POST[lastPage]" );
	}
	else
	{
		echo "Failed: " . $e->getMessage();
	}
}
?>
