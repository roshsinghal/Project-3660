<?php
session_start(); // Starting Session

if(empty($_SESSION['is_admin']))
{
	header('location: index.php');
}
if(!$_SESSION['is_admin'])
{
	header('location: index.php');
}

?>
<html>

<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Manage Copy|Book Service Rental
</title>
<body>

<?php
 require 'navigation.php';
?>

<h1 align="center">Insert Copies</h1>
<?php 
	
	$username = 'group7';
	$password = 'zpakwn';	

	$conn = mysql_connect('17carson.cs.uleth.ca',$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 
	
	$sql = "select  bd.book_id,
	bd.number_available , 
	bd.title , 
	bd.isbn , 
	bd.publisher,
	ba.copy_id,
	ba.availability_status
	from book_details bd 
	inner join book_availability ba on bd.book_id=ba.book_id
	where bd.book_id='$_POST[bookID]';"; 
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Book ID</th>';
	 echo '<th>Copy ID</th>';
  	 echo '</tr>';
	 echo '<tr align="center">';
	 $result = mysql_query("select title, publisher, isbn from book_details where book_id='$_POST[bookID]'",$conn);
	 $val = mysql_fetch_row($result);
    	echo "<td>$val[0]</td>";
    	echo "<td>$val[1]</td>";		
    	echo "<td>$val[2]</td>";
		echo "<form action=\"insertCopy.php\" method=\"post\">";
		echo "<td><input type=\"text\" name=\"bookID\" value=\"$_POST[bookID]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"copyID\"></td>";
		echo "<td><input type=\"submit\" value=\"Insert\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	echo '</table>';
	$result = mysql_query($sql,$conn);
	if(mysql_num_rows($result) > 0)
	{
	 echo '<h1 align="center">Delete Copies</h1>';
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Book ID</th>';
	 echo '<th>Copy ID</th>';
	 echo '<th>Reason</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {
		echo '<tr align="center">';
    	echo "<td>$val[2]</td>";
    	echo "<td>$val[4]</td>";		
    	echo "<td>$val[3]</td>";
		echo "<form action=\"deleteCopy2.php\" method=\"post\">";
		echo "<td><input type=\"text\" name=\"bookID\" value=\"$_POST[bookID]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"copyID\" value=\"$val[5]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"reason\" value=\"\"></td>";
		echo "<td><input type=\"submit\" value=\"Delete\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	 }
	 echo '</table>';
	}
	
	mysql_close($conn);
?>
</body>
</html>
