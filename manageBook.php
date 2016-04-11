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
Manage Book|Book Service Rental
</title>
<body>

<?php
 require 'navigation.php';
?>

<h1 align="center">Insert Book</h1>
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

	$sql = "select * from book_details"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
	 echo '<th>Author(s)</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Available</th>';
	 echo '<th>Total Copies</th>';
	 echo '<th>Book ID</th>';
	 echo '<th>Archived?</th>';
  	 echo '</tr>';
	 	 	echo '<tr align="center">';
		echo "<form action=\"insertBook.php\" method=\"post\">";
		echo "<td><input type=\"text\" name=\"title\" value=\"\"></td>";
		echo "<td><input type=\"text\" name=\"author\" value=\"\"></td>";
		echo "<td><input type=\"text\" name=\"publisher\" value=\"\"></td>";
		echo "<td><input type=\"text\" name=\"isbn\" value=\"\"></td>";
		echo "<input type=\"hidden\" name=\"available\" value=\"0\" readonly></td>";
		echo "<td>0</td>";
		echo "<input type=\"hidden\" name=\"totalcopies\" value=\"0\" readonly>";
		echo "<td>0</td>";
		echo "<td><input type=\"text\" name=\"bookID\" value=\"\"></td>";
		echo "<input type=\"hidden\" name=\"archived\" value=\"0\" readonly>";
		echo "<td>No</td>";
		echo "<td><input type=\"submit\" value=\"Insert\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	echo '</table>';

		echo '<table style="width:100%">';
		echo '<h1 align="center">Manage Book</h1>';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
	 echo '<th>Author(s)</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Available</th>';
	 echo '<th>Total Copies</th>';
	 echo '<th>Book ID</th>';
	 echo '<th>Archived?</th>';
  	 echo '</tr>';	

	 while($val = mysql_fetch_row($result))
	 {

		echo '<tr align="center">';
		echo "<form action=\"updateBook.php\" method=\"post\">";
		echo "<td><input type=\"text\" name=\"title\" value=\"$val[3]\"></td>";
		echo "<td><input type=\"text\" name=\"author\" value=\"$val[7]\"></td>";
		echo "<td><input type=\"text\" name=\"publisher\" value=\"$val[5]\"></td>";
		echo "<td><input type=\"text\" name=\"isbn\" value=\"$val[4]\"></td>";
		echo "<td>$val[1]</td>";
		echo "<td>$val[6]</td>";
		echo "<td>$val[0]</td><input type=\"hidden\" name=\"bookID\" value=\"$val[0]\" readonly>";
		if($val[2])
			echo "<td>Yes</td>";
		else
			echo "<td>No</td>";
		echo "<td><input type=\"submit\" value=\"Update\"></td>";
		echo "</form>";
		if(!$val[2])
		{
			echo "<form action=\"archiveBook.php\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"bookID\" value=\"$val[0]\" readonly>";
			echo "<input type=\"hidden\" name=\"archive\" value=\"1\" readonly>";
			echo "<td><input type=\"submit\" value=\"Archive\"></td>";
			echo "</form>";
		}
		else
		{
			echo "<form action=\"archiveBook.php\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"bookID\" value=\"$val[0]\" readonly>";
			echo "<input type=\"hidden\" name=\"archive\" value=\"0\" readonly>";
			echo "<td><input type=\"submit\" value=\"Restore\"></td>";
			echo "</form>";
		}
		echo '</tr>';
	 }
	echo '</table>';
	} 
	
	mysql_close($conn);
?>
</div>
</body>
</html>
