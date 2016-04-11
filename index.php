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

	$_REQUEST['search'] = mysql_escape_string($_REQUEST['search']);

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

	$sql = "select title, author, publisher, isbn, number_available, book_id from book_details where archived !=1 and $booksearch order by title"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
		 while($val = mysql_fetch_row($result))
		 {;
			echo '<br>';	
			echo '<div class="bookcontainer">';
				if(file_exists("images/$val[5].jpg"))
				{
					echo "<img class=\"imgList\" src=\"images/$val[5].jpg\" alt=\"$val[0]\" align=\"left\">";
				}
				else
				{
					echo "<img class=\"imgList\" src=\"images/nocover.jpg\" alt=\"$val[0]\" align=\"left\">";
				}
			echo "<form action=\"bookDetails.php\" method=\"get\">";
			echo "<input type=\"hidden\" name=\"selectID\" value=\"$val[5]\">";
			echo "<a href=\"#\" onclick=\"this.parentNode.submit(); return false;\"><h2>$val[0]</h2></a>";
			echo "</form>";
			echo "Author: $val[1]<br>";		
			echo "Publisher: $val[2]<br>";
			echo "ISBN: $val[3]<br>";
			echo "Copies Available: $val[4]<br>";
			echo '</div>';
		 }
	} 
	else
	{
		echo '<p>No books match criteria.</p>'; 
	}
	echo '<br>';	
	mysql_close($conn);
	
?>
</div>
</body>
</html>
