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
	
	$username = 'group7';
	$password = 'zpakwn';	

	$conn = mysql_connect('17carson.cs.uleth.ca',$username,$password) or die(mysql_error());
	mysql_select_db($username,$conn); 

	$sql = "select title, publisher, isbn, archived, number_available, author from book_details where book_id='$_REQUEST[selectID]'"; 
	$result = mysql_query($sql,$conn);
	if(mysql_num_rows($result) > 0)
	{
		$val = mysql_fetch_row($result);
		echo "<h1 align=\"center\">$val[0]</h1>";
		if(file_exists("images/$_REQUEST[selectID].jpg"))
		{
			echo "<img src=\"images/$_REQUEST[selectID].jpg\" alt=\"$val[0]\">";
		}
		else
		{
			echo "<img src=\"images/nocover.jpg\" alt=\"$val[0]\">";
		}
		echo "<p>Written by $val[5]</p>";
		echo "<p>Published by $val[1]</p>";
		echo "<p>ISBN: $val[2]</p>";
		if($val[3])
		{
			echo "<p><b>Archived.</b></p>";
		}
		else
		{
			if($val[4] == 1)
				echo "<p>1 copy available</p>";
			elseif($val[4] == 0)
				echo "<p>No copies available</p>";
			else
				echo "<p>$val[4] copies available</p>";
				
			if(!empty($_SESSION['login_user']))
			{
				if(!$_SESSION['is_admin'])
				{
					if($val[4] > 0)
					{
						echo "<form action=\"orderBook.php\" method=\"post\">";
						echo "<input type=\"hidden\" name=\"bookID\" value=\"$_REQUEST[selectID]\">";
						echo "<input class=\"orderButton\" type=\"submit\" value=\"Order\">";
						echo "</form>";
					}
				}
			}
			else
			{

			

				//ugly and non-functional, fix this
				echo '<ul><li><a id="trigger_mod" href="#fire_mod" class="btn_log">ORDER</a></li></ul>';
			}
		}
	}
	else
	{
		echo '<p>Book does not exist.</p>'; 
	}
?>

	<div id="fire_mod" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Select login Login -->
			<div class="select_login">
				
				<div class="action_btns">
					<div class="one_half"><a href="#" id="form_login" class="btn">Login</a></div>
					<div class="one_half last"><a href="register.php" id="register_form" class="btn">Register</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login">
				<form action="login.php" method="post">
					<label>Username</label>
					<input type="text" name="username" />
					<br />

					<label>Password</label>
					<input type="password" name="password" />
					<br />
					
					<?php 
						echo "<input type=\"hidden\" name=\"lastPage\" value=\"$_SERVER[REQUEST_URI]\">";
					?>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><button type="submit" class="btn btn_red">Login</button></div>
					</div>
				</form>

			</div>
		</section>
	</div>
</div>

<script type="text/javascript">
	$("#trigger_mod").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#form_login").click(function(){
			$(".select_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".select_login").close();
			return false;
		});

		// Going back to Select Form
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".select_login").show();
			$(".header_title").text('Log In');
			return false;
		});

	})
</script>

</body>
</html>
