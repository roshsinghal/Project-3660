<?php
session_start(); // Starting Session

if(empty($_SESSION['is_admin']))
{
	header('location: index.php');
	die();
}
if(!$_SESSION['is_admin'])
{
	header('location: index.php');
	die();
}

?>
<html>

<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Manage Copies|Book Service Rental
</title>
<body>

<?php
 	require 'navigation.php';
?>

<h1 align="center">Select a Book</h1>
<?php 
	if("" == trim($_REQUEST["search"]))
	{
		$booksearch = "*";
	}
	else
	{
		$booksearch = $_REQUEST["search"];
	}

	
	$username = 'group7';
	$password = 'zpakwn';	

	$conn = mysql_connect('17carson.cs.uleth.ca',$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 

	$sql = "select title, publisher, isbn, number_available, book_id, author from book_details"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
	 echo '<th>Author</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Available</th>';
	 echo '<th>Book ID</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {
		echo '<tr align="center">';
    	echo "<td>$val[0]</td>";
		echo "<td>$val[5]</td>";
    	echo "<td>$val[1]</td>";		
    	echo "<td>$val[2]</td>";
		echo "<td>$val[3]</td>";
		echo "<form action=\"deleteCopy.php\" method=\"post\">";
		echo "<td><input type=\"text\" name=\"bookID\" id=\"bookID\" value=\"$val[4]\" readonly></td>";
		echo "<td><input type=\"submit\" value=\"Manage Copies\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	 }
	} 
	else
	{
		echo '<p>No books match criteria.</p>'; 
	}
	
	mysql_close($conn);
?>
</body>
</html>
