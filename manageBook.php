<html>

<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
</head>

<title>
Manage Book|Book Service Rental
</title>
<body>

<ul>
	<li><a href="#LogIn">Log In</a></li>
	<li><a href="#manageBook.html">Manage</a></li>
	<li><a href="#Help">Help</a></li>
	<li><a class="active" href="main.html">Home</a></li>
	
	<li><input type="image" src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-th.png' alt='Search Button Without Text clip art' height='60' width='60'></input></li><br>
	<li><input type="text" name="search" value="Enter a keyword" size=100/></li>
</ul>

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
		echo "<td><input type=\"text\" name=\"publisher\" value=\"\"></td>";
		echo "<td><input type=\"text\" name=\"isbn\" value=\"\"></td>";
		echo "<td><input type=\"text\" name=\"available\" value=\"0\" readonly></td>";
		echo "<td><input type=\"text\" name=\"totalcopies\" value=\"0\" readonly></td>";
		echo "<td><input type=\"text\" name=\"bookID\" value=\"\"></td>";
		echo "<td><input type=\"text\" name=\"archived\" value=\"0\" readonly></td>";
		echo "<td><input type=\"submit\" value=\"Insert\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	echo '</table>';

		echo '<table style="width:100%">';
		echo '<h1 align="center">Manage Book</h1>';
  	 echo '<tr align="center">';
     echo '<th>Title</th>';
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
		echo "<td><input type=\"text\" name=\"publisher\" value=\"$val[5]\"></td>";
		echo "<td><input type=\"text\" name=\"isbn\" value=\"$val[4]\"></td>";
		echo "<td><input type=\"text\" name=\"available\" value=\"$val[1]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"totalcopies\" value=\"$val[6]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"bookID\" value=\"$val[0]\" readonly></td>";
		echo "<td><input type=\"text\" name=\"archived\" value=\"$val[2]\" readonly></td>";
		echo "<td><input type=\"submit\" value=\"Update\"></td>";
		echo "</form>";
		echo "<td></td>";
		echo '</tr>';
	 }
	echo '</table>';
	} 
	
	mysql_close($conn);
?>
</body>
</html>
