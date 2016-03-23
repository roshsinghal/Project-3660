// TAB YOUR SHIT OUT


<?php
//header("Location: index.php"); 
//    exit;
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username $_POST[username] or Password $_POST[password] is invalid";
}
else
{
// Define $username and $password
$username="$_POST[username]";
$password="$_POST[password]";
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect('17carson.cs.uleth.ca', 'group7', 'zpakwn');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db('group7', $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select is_admin from users where password='$password' AND user_name='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
if($val[0] == 1)
{
	$_SESSION['is_admin'] = True;
}
else
{
	$_SESSION['is_admin'] = False;
}
//header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
//echo $error;
if($error != '') header('location: index.php?error=' . $error);
else header('location: index.php');
?>
