<?php
$page_title = 'Welcome to Our Site!';
$page_text = 'Home Page';
include ('includes/header2.php');
?>

<h1>Hi! Welcome to Fruity Fruit Website!</h1>


	<div class="mySlides fade">
	  <!-- <div class="numbertext">1 / 3</div> -->
	  <img src="includes/dragon.jfif" style="width:100%">
	  <!-- <div class="text">Caption Text</div> -->
	</div>

	<div class="mySlides fade">
	  <!-- <div class="numbertext">2 / 3</div> -->
	  <img src="includes/orange.jpg" style="width:100%">
	  <!-- <div class="text">Caption Two</div> -->
	</div>

	<div class="mySlides fade">
	  <!-- <div class="numbertext">3 / 3</div> -->
	  <img src="includes/trofruits.jpg" style="width:100%">
	  <!-- <div class="text">Caption Three</div> -->
	</div>

<br>

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
