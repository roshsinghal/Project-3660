<?php
	session_start(); // Starting Session
	
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

	$sql = "select  
	bd.title, 
	bd.publisher,
	bd.isbn, 
	ba.date_rented,
	ba.order_id,
	bd.author,
	ba.user_id
	from book_details bd 
	inner join orders ba on bd.book_id=ba.book_id
	where ba.delivered=1 and ba.returned=0 order by order_id"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
	 echo '<th>Username</th>';
     echo '<th>Title</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Date Rented</th>';
	 echo '<th>Return</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {
		echo '<tr align="center">';
		echo "<td>$val[6]</td>";
		echo "<td>";
    	echo "$val[0]";
		echo "</td>";			
    	echo "<td>$val[2]</td>";
		echo "<td>$val[3]</td>";
		echo "<td>";
		echo "<form action=\"returnBook.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"orderID\" value=\"$val[4]\">";
		echo "<input class=\"returnButton\" type=\"submit\" value=\"Accept Return\">";
		echo "</form>";
		echo "</td>";
		echo '</tr>';
	 }
	} 
	else
	{
		echo '<p>There is no pending returns.</p>'; 
	}
	
	mysql_close($conn);
?>

</div>
</body>
</html>