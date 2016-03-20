<html>

<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Delete Book|Book Service Rental
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

	$sql = "select title, publisher, isbn, number_available, book_id from book_details"; 
	$result = mysql_query($sql,$conn);
    if(mysql_num_rows($result) > 0)
	{
	 echo '<table style="width:100%">';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
     echo '<th>Publisher</th>';		
     echo '<th>ISBN</th>';
	 echo '<th>Available</th>';
	 echo '<th>Book ID</th>';
  	 echo '</tr>';
	 while($val = mysql_fetch_row($result))
	 {
		echo '<tr align="center">';
    	echo "<td>$val[0]</td>";
    	echo "<td>$val[1]</td>";		
    	echo "<td>$val[2]</td>";
		echo "<td>$val[3]</td>";
		echo "<form action=\"deleteCopy.php\" method=\"delete\">";
		echo "<td><input type=\"text\" name=\"bookID\" id=\"bookID\" value=\"$val[4]\" readonly></td>";
		echo "<td><input type=\"submit\" value=\"Manage Copies\"></td>";
		echo "</form>";
		echo "<td></td>";
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
