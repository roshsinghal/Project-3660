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

	if(!isset($_REQUEST["search"]))
	{
	 $booksearch = "1=1";
	}
	elseif("" == trim($_REQUEST["search"]))
	{
		$booksearch = "1=1";
	}
	else
	{
		$booksearch = "title like '%$_REQUEST[search]%'";
	}

	
	$username = 'group7';
	$password = 'zpakwn';	

	$conn = mysql_connect('17carson.cs.uleth.ca',$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 

	$sql = "select title, publisher, isbn, number_available from book_details where archived !=1 and $booksearch order by title"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Available</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {
		echo '<tr align="center">';
    	echo "<td>$val[0]</td>";
    	echo "<td>$val[1]</td>";		
    	echo "<td>$val[2]</td>";
		echo "<td>$val[3]</td>";
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
