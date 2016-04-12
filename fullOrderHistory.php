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
	bd.author,
	ba.date_returned,
	ba.returned,
	ba.user_id,
	ba.return_id,
	ba.delivered,
	ba.order_id,
	bf.full_name
	from book_details bd 
	inner join orders ba on bd.book_id=ba.book_id 
	inner join users bf on bf.user_name=ba.return_id
	order by order_id desc"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
	 echo '<th>Order#</th>';
	 echo '<th>User</th>';
     echo '<th>Title</th>';	
     echo '<th>ISBN</th>';
	 echo '<th>Date Rented</th>';
	 echo '<th>Date Returned</th>';
	 echo '<th>Returned By</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {
		echo '<tr align="center">';
		echo "<td>$val[10]</td>";
		echo "<td>$val[7]</td>";
		echo "<td>";
    	echo "$val[0]";
		echo "</td>";	
    	echo "<td>$val[2]</td>";
		echo "<td>$val[3]</td>";
		if($val[6])
		{
			echo "<td>$val[5]</td>";
			echo "<td>$val[11]</td>";
		}
		else
		{
			echo "<td>Not Returned</td>";
			echo "<td>-</td>";
		}
		echo '</tr>';
	 }
	} 
	else
	{
		echo '<p>There is no order history.</p>'; 
	}
	
	mysql_close($conn);
?>

</div>
</body>
</html>