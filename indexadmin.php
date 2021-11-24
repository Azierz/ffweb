<?php
$page_title = 'Welcome back!';
$page_text = 'Admin Home Page';
include ('includes/aheader.php');
?>

<h1>Welcome back, admin !</h1>


	<img src="includes/images/pastel.png" style="width:100%">
	<div class="centered"><h2>Premium Farm Fresh fruits
		<br>to your doorstep.</h2>
		<br><button class="btn"><a href="menu.php">Shop Now</a></button>
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
