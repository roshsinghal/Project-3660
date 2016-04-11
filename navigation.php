<div id="container">


	<header>
		<a href="index.php" target="_self"><img class="header_logo" src="images/booklogo.jpg" alt="banner_logo"></a>
		
		<div class="searchBox">
		<form action="index.php" method="get">
		<input type="text" name="search" class="textBar" size=75 align=right/>
		<input id='searchB' class='searchB' align=right type="image" src='http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-th.png' alt='Search Button Without Text clip art' height='33' width='35'></input>
		</form>
		</div>
		
	</header>

	<nav>
	
		<ul>
		
		
		<?php 
		
		if(!empty($_SESSION['login_user']))	
			echo "<li><a id='logoutbttn' href='logout.php'>Logout</a></li>";
			
		else
			echo '<li><a id="modal_trigger" href="#modal" class="btn_log">Login</a></li>';

		?>
		
		
	
		<div class="dropdown">
		<li><a href="#" >Manage</a>
			<div class="dropdown-content">
			<ul>
			<?php
				if(!$_SESSION['is_admin'])
				{	
					echo '<p><a class="active" href="updateCustomer.php">Update Info</a></p>';
					echo '<p><a class="active" href="showOrders.php">Checkout List</a></p>';
					echo '<p><a class="active" href="showHistory.php">Order History</a></p>';
				}
				else
				{
					echo '<p><a class="active" href="manageBook.php">Manage Books</a></p>';
					echo '<p><a class="active" href="deleteBook.php">Manage Copies</a></p>';
					echo '<p><a class="active" href="pendingReturns.php">Manage Returns</a></p>';
					echo '<p><a class="active" href="fullOrderHistory.php">Full Order History</a></p>';
					echo '<p><a class="active" href="addAdmin.php">Add Admin</a></p>';
				}
			?>
			</ul>
			</div>
		</li>
		</div>
		
		<li><a href="help.php">FAQ</a></li>
		<li><a class="active" href="index.php">Home</a></li>
		
		</ul>
		
		<?php 
		
		if(!empty($_SESSION['login_user']))
		{
			echo "<ul class=\"userL\"><li>Hello, $_SESSION[login_user]";
			if($_SESSION['is_admin'])
				echo ", ADMIN";
			echo "</li></ul>";
		}
		else
			echo "<ul class=\"userL\"><li>Hello, Guest</li></ul>";
		
		?>
	
	</nav>


	

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

