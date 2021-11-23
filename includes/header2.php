<?php session_start(); ?>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen"
/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<div id="header">
		<img src = "includes/fff.jpg">
		<img src = "includes/fff.jpg">
		<h1>Fruity Fruit </h1>
		<h2><?php echo $page_text; ?> </h2>

	</div>
	<div id="navigation">
		<ul>

		<?php // Create a login/logout link:
if (isset($_SESSION['CustID'])) {
	echo '
	<li><a href="logout.php">Logout</a></li>
	<li><a href="aboutus.php">About Us</a></li>
	<li><a href="menu.php">Menu</a></li>
	<li><a href="index.php">Home</a></li>';
} else {
	echo '
	<li><a href="login.php">Sign In</a></li>
	<li><a href="aboutus.php">About Us</a></li>
	<li><a href="menu.php">Menu</a></li>
	<li><a href="index.php">Home</a></li>';
}
?>
		</ul>
	</div>
	<div id="content">
