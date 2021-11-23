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
		<ul>
			<div class="search-container">
				<form action="/action_page.php">
					<input type="text" placeholder="Search.." name="search" size="25">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>

			<a class="cart" href="#"><i class="fa fa-shopping-cart"></i></a>
			<li><a href="logout.php">Sign out</a></li>
			<li><a href="aboutus.php">About Us</a></li>
			<li><a href="menu.php">Menu</a></li>
			<li><a href="index.php">Home</a></li>;

		</ul>
	</div>
	<div id="content">
