<?php
	include ('includes/constants.php');
?>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen"
/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
	<div id="header">
		<img src = "includes/fff.jpg" style="width: 100%; height: auto;">
		<h1>Fruity Fruit </h1>
		<h2><?php echo $page_text; ?> </h2>

	</div>
	<div id="navigation">
		<ul>

		<?php // Create a login/logout link:
if (isset($_SESSION['stud_id'])) {
	echo '


			<li><a href="view_users.php">View Users</a></li>
			<li><a href="num.php">Compare Number</a></li>
			<li><a href="calc.php">BMI Calculator</a></li>
			<li><a href="logout.php">Logout</a></li>';
} else {
	echo '
	<li><a href="index.php">Home Page</a></li>
	<li><a href="login.php">Login</a></li>
	<li><a href="register.php">Program Registration</a></li>';
}
?>
		</ul>
	</div>
	<div id="content">