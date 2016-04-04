<ul>
	<div class="container">

	<?php 
		
		if(!empty($_SESSION['login_user']))	
			echo "<li><a id='logoutbttn' href='logout.php'>Logout</a></li>";
			
		else
			echo '<li><a id="modal_trigger" href="#modal" class="btn_log">Login</a></li>';

	?>

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
  		
	<li><a href="#Help">FAQ</a></li>
	<li><a class="active" href="index.php">Home</a></li>

	<div class="dropdown">
	<li><a href="#" >Manage</a>
		<div class="dropdown-content">
		<ul>
			<p><a class="active" href="updateCustomer.php">Update Info</a></p>
			<p><a class="active" href="checkout.php">Checkout</a></p>
		</ul>
		</div>
	</li>
	</div>

	<form action="index.php" method="get">
	<li><input id='searchB' type="image" src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-th.png' alt='Search Button Without Text clip art' height='40' width='40'></input></li><br>
	<li><input type="text" name="search" value="" size=100/></li>
	<?php 
		
		if(!empty($_SESSION['login_user']))
		{
			echo "<li>Hello, $_SESSION[login_user]";
			if($_SESSION['is_admin'])
				echo ", ADMIN";
			echo "</li>";
		}
		
	?>
   </form>

</ul>
