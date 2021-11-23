<?php
$page_title = 'Welcome to Our Site!';
$page_text = 'Home Page';
include ('includes/header2.php');
?>

<h1>Hi! Welcome to Fruity Fruit Website!</h1>


	<div class="mySlides fade">
	  <div class="numbertext">1 / 3</div>
	  <img src="includes/jediknight.jpeg" style="width:100%">
	  <div class="text">Caption Text</div>
	</div>

	<div class="mySlides fade">
	  <div class="numbertext">2 / 3</div>
	  <img src="includes/judy.png" style="width:100%">
	  <div class="text">Caption Two</div>
	</div>

	<div class="mySlides fade">
	  <div class="numbertext">3 / 3</div>
	  <img src="includes/kirito.jpg" style="width:100%">
	  <div class="text">Caption Three</div>
	</div>

<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<?php
include ('includes/footer.html');
?>
