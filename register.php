<html>
<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
</head>

<title>
Register|Book Rental Service
</title>
<body>

<ul>
	<li><a href="#LogIn">Log In</a></li>
	<li><a href="#">Manage</a></li>
	<li><a href="#Help">Help</a></li>
	<li><a class="active" href="main.html">Home</a></li>
	
	<li><input type="image" src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-th.png' alt='Search Button Without Text clip art' height='60' width='60'></input></li><br>
	<li><input type="text" name="search" value="Enter a keyword" size=100/></li>
</ul>

<h1 align="center">Register</h1>

<form action="addCustomer.php" method="post">
<br>
Username: <input type="text" name="userName"><br>
Password: <input type="text" name="password"><br>
Full Name: <input type="text" name="fullName"><br>
Email: <input type="text" name="email"><br>
Address: <input type="text" name="address"><br>
Phone Number: <input type="text" name="phoneNumber"><br>
<input type="submit" value="Submit">
</form>
</body>
</html>