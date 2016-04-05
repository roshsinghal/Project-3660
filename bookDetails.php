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

	$sql = "select * from book_details book_id='$_REQUEST[selectID]'"; 
	$result = mysql_query($sql,$conn);
	if(mysql_num_rows($result) > 0)
	{
		$val = mysql_fetch_row($result);
		echo "<h1 align=\"center\">$val[4]</h1>";
		echo "<p>by $val[6]</p>";
		echo "<p>ISBN: $val[5]</p>";
		if($val[2])
		{
			echo "<p><b>Archived.</b></p>";
		}
		else
		{
			echo "<p>$val[1] copies available</p>";
		}
	}
	else
	{
		echo '<p>Book does not exist.</p>'; 
	}
?>

</body>
</html>