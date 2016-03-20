<html>

<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Delete Copy|Book Service Rental
</title>
<body>

<ul>
	<div class="container">

	<li><a id="modal_trigger" href="#modal" class="btn_log">Logout</a></li>

	</div>
	
	<li><a href="manageBook.html">Manage</a></li>
	<li><a href="#Help">Help</a></li>
	<li><a class="active" href="main.html">Home</a></li>
	
	<li><input id='searchB' type="image" src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-th.png' alt='Search Button Without Text clip art' height='40' width='40'></input></li><br>
	<li><input type="text" name="search" value="Enter a keyword" size=100/></li>
</ul>

<h1 align="center">Delete a Book</h1>
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
	where bd.book_id='$_REQUEST[bookID]';"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
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
		echo "<form action=\"deleteCopy2.php\" method=\"delete\">";
		echo "<td><input type=\"text\" name=\"bookID\" value=\"$_REQUEST[bookID]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"copyID\" value=\"$val[5]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"reason\" value=\"\"></td>";
		echo "<td><input type=\"submit\" value=\"Delete\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	 }
	} 
	else
	{
		echo "<p>No copies exist of ";
		echo ($_REQUEST["bookID"]);
		echo ".</p>"; 
	}
	
	mysql_close($conn);
?>
</body>
</html>
