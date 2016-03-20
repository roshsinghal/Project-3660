<html>
<head>
<link href="mainCSS.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="jquery.leanModal.min.js"></script>
</head>

<title>
Register|Book Rental Service
</title>
<body>

<ul>
	<div class="container">

	<li><a id="modal_trigger" href="#modal" class="btn_log">Login</a></li>

	<div id="modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Select login Login -->
			<div class="select_login">
				
				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
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
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
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

	<li><a href="#">Manage</a></li>
	<li><a href="#Help">Help</a></li>
	<li><a class="active" href="main.html">Home</a></li>
	
	<li><input id='searchB' type="image" src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-th.png' alt='Search Button Without Text clip art' height='40' width='40'></input></li><br>
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
