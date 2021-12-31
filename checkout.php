<?php
$page_title = 'Checkout';
$page_text = 'Checkout';
include ('includes/header2.php');

if (empty($_SESSION['CustID'])) {
	echo '
		<script>
		window.alert("\nPLEASE LOGIN FIRST!");
		setTimeout(function(){location.href="login.php"},0);
		</script>';
}
?>

<h1>Fruity Fruit Checkout</h1>

		<img src="includes/images/pastel.png" style="width:100%">
		<div class="centered"><h2>THANK YOU FOR PURCHASING WITH US!</h2>
		</div>
<?php
include ('includes/footer.html');
?>
