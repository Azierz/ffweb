<?php
$page_title = 'Checkout';
$page_text = 'Checkout';
include ('includes/header2.php');

require ('includes/constants.php');
foreach($_SESSION['cart'] as $cart => $val) {
	$ProdID = $val;
	$Qty = $_SESSION['qty'][$val];

	$q = "SELECT * FROM product WHERE ProductID='$ProdID'";
	$r = @mysqli_query ($dbc,$q);

	if (mysqli_num_rows($r) == 1) {
				
		while ($data = mysqli_fetch_array($r)) {
			
			$Qty = $data['Quantity'] - $Qty;
			$qU = "UPDATE product SET Quantity='$Qty' WHERE ProductID='$ProdID'";
			
			if (@mysqli_query($dbc,$qU) == 0) {
				echo '<script>
				window.alert("\nERROR!\nPlease try again later.");
				setTimeout(function(){location.href="cart.php"},0);
				</script>';
			} else {
				$Order_CustID = $_SESSION['CustID'];
				$Order_ProdID = $ProdID;
				$Order_Quantity = $_SESSION['qty'][$val];

				$qI = "INSERT INTO cust_order VALUES (0, '$Order_CustID', '$Order_ProdID', '$Order_Quantity', NOW() )";
				$rI = mysqli_query($dbc, $qI);
			}
		}
	}
}
if ($rI) {
	unset($_SESSION['cart']);
	unset($_SESSION['qty']);
	echo '<script>
	window.alert("\ORDER SUCCESS!\nThank you for purchasing with us!");
	setTimeout(function(){location.href="index.php"},0);
	</script>';
} else {
	echo '<script>
	window.alert("\nERROR!\nPlease try again later.");
	setTimeout(function(){location.href="cart.php"},0);
	</script>';
}
?>

<h1>Order Success!</h1>

<img src="includes/images/pastel.png" style="width:100%">
<!-- <div class="centered"><h2>THANK YOU FOR PURCHASING WITH US!</h2> -->
</div>

<?php
include ('includes/footer.html');
?>
