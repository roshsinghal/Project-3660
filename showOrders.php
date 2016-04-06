<?php
	session_start(); // Starting Session
	
if(empty($_SESSION['login_user']))
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
	bd.isbn, 
	bd.publisher,
	ba.date_rented,
	ba.returned,
	ba.book_id
	from book_details bd 
	inner join orders ba on bd.book_id=ba.book_id
	where ba.user_id='$_SESSION[login_user]'"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Date Rented</th>';
	 echo '<th>Returned?</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {;
		echo '<tr align="center">';
		echo "<td>";
    	echo "$val[0]";
		echo "</td>";
    	echo "<td>$val[1]</td>";		
    	echo "<td>$val[2]</td>";
		echo "<td>$val[3]</td>";
		if($val[4] == 1)
			echo "<td>Yes</td>";
		else
		{
			echo "<td>No</td>";
			echo "<td>";
			echo "<form action=\"returnBook.php\" method=\"post\">";
			echo "<input type=\"hidden\" name=\"orderID\" value=\"$val[4]\">";
			echo "<input class=\"returnButton\" type=\"submit\" value=\"Return\">";
			echo "</form>";
			echo "</td>";
		}
		echo '</tr>';
	 }
	} 
	else
	{
		echo '<p>There is no order history for this user.</p>'; 
	}
	
	mysql_close($conn);
?>

</body>
</html>
