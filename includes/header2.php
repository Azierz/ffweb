<?php session_start(); ?>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<div id="header">
		<img src = "includes/images/fff.jpg">
		<img src = "includes/images/fff.jpg">
		<h1>Fruity Fruit </h1>
		<h2><?php echo $page_text; ?> </h2>

	</div>
	<div id="navigation">
		<ul>
			<div class="search-container">
		    <form action="/action_page.php">
		      <input type="text" placeholder="Search.." name="search" size="25">
		      <button type="submit"><i class="fa fa-search"></i></button>
		    </form>
		  </div>

		<?php // Create a login/logout link:
if (isset($_SESSION['CustID'])) {
	echo '
	<a class="cart" href="#"><i class="fa fa-shopping-cart"></i></a>
	<li><a href="logout.php">Sign Out</a></li>
	<li><a href="aboutus.php">About Us</a></li>
	<li><a href="menu.php">Menu</a></li>
	<li><a href="/">Home</a></li>';
} else {
	echo '
	<a class="cart" href="#"><i class="fa fa-shopping-cart"></i></a>
	<li><a href="login.php">Sign In</a></li>
	<li><a href="aboutus.php">About Us</a></li>
	<li><a href="menu.php">Menu</a></li>
	<li><a href="/">Home</a></li>
	';
}
?>
		</ul>

	</div>
	<div id="content">
