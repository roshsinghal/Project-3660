<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (empty($_POST['username']) || empty($_POST['password'])) {
//$error = "Username $_POST[username] or Password $_POST[password] is invalid";
echo "Please Log In First";
echo "<script>setTimeout(\"location.href = 'hhttp://17carson.cs.uleth.ca/~cluz3660/index.php';\",1500);</script>";
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
$query = mysql_query("select * from users where password='$password' AND user_name='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: index.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
echo "$error";
?>
