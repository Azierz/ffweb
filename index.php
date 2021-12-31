<?php
$page_title = 'Welcome to Our Site!';
$page_text = 'Home Page';
include ('includes/header2.php');

if (isset($_SESSION['CustID'])) {
	echo '<h1>Hi ' . $_SESSION['CustName'] . '! Welcome back to Fruity Fruit Website!</h1>';
} else {
	echo '<h1>Hi! Welcome to Fruity Fruit Website!</h1>';
}
?>
	<div class="mySlides fade">
		<img src="includes/images/dragon.jfif" style="width:100%">
	</div>

	<div class="mySlides fade">
		<img src="includes/images/orange.jpg" style="width:100%">
	</div>

	<div class="mySlides fade">
		<img src="includes/images/trofruits.jpg" style="width:100%">
	</div>
	<div class="centered"><h2>Premium Farm Fresh fruits
		<br>to your doorstep.</h2>
		<?php
		if (isset($_SESSION['CustID'])) {
			echo '<br><button class="btn"><a href="menu.php">Shop Now</a></button>';
		} else {
			echo '<br><button class="btn"><a href="login.php">Sign In</a></button>';
		}
		?>
	</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>
<?php
include ('includes/footer.html');
?>
