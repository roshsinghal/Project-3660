<?php
session_start(); // Starting Session
?>
<html>

<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Book Rental Service
</title>
<body>
<?php 
	require 'navigation.php';
	
	$username = 'group7';
	$password = 'zpakwn';	

	$conn = mysql_connect('17carson.cs.uleth.ca',$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 

	$sql = "select title, publisher, isbn, archived, number_available from book_details where book_id='$_REQUEST[selectID]'"; 
	$result = mysql_query($sql,$conn);
	if(mysql_num_rows($result) > 0)
	{
		$val = mysql_fetch_row($result);
		echo "<h1 align=\"center\">$val[0]</h1>";
		echo "<p>Published by $val[1]</p>";
		echo "<p>ISBN: $val[2]</p>";
		if($val[3])
		{
			echo "<p><b>Archived.</b></p>";
		}
		else
		{
			echo "<p>$val[4] copies available</p>";
		}
	}
	else
	{
		echo '<p>Book does not exist.</p>'; 
	}
?>

</body>
</html>