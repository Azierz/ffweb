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
		<img src = "includes/images/fff.jpg" style="width: 100%; height: auto;">
		<h1>Fruity Fruit </h1>
		<h2><?php echo $page_text; ?> </h2>

		</div>
			<div id="navigation">
				<h1 style="float: left;">Welcome back, admin !</h1>
				<ul>
				<?php // Create a login/logout link:
		if (isset($_SESSION['admin_id'])) {
			echo '<li><a href="logout.php">Sign Out</a></li>';
		} else {
			echo '<li><a href="logout.php">Sign Out</a></li>';
		}
		?>
				</ul>
	</div>
	<div id="content">
