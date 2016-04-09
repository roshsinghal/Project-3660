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
?>
<h1>FAQ</h1>
<h3>How do I register?</h3>
<p>Click Login, and then click register, and fill in all the fields with your information.</p>
<h3>How do I check out a book?</h3>
<p>Click a book's title on the main page to get to the individual book page. If there are available copies, you can click Order to instantly order the book.</p>
<h3>How do I see my order history?</h3>
<p>Hover over the Manage button and click Order History.</p>
<h3>How do I become admin?</h3>
<p>You don't.</p>
<h3>How do I get to the help page?</h3>
<p>...</p>
</div>
</body>
</html>