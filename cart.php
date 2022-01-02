<?php
$page_title = 'Shopping Cart';
$page_text = 'Shopping Cart';
include ('includes/header2.php');

//print_r($_SESSION);		//TEST SES OUTPUT

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if($_POST['Pmethod'] == 'Online') {
		$_SESSION['method'] = 1;
		header("Location:payment.php");
	} else {
		$_SESSION['method'] = 0;
		header("Location:checkout.php");
	}
}

?>

<h1>Fruity Fruit Cart</h1>

		<div class="menu">
			<table border="1">
				<tr>
					<th>Product(s)</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
				<?php
				require ('includes/constants.php');

				if (empty($_SESSION['cart'])) {
					echo '
						<script>
						window.alert("\nShopping Cart Empty!");
						setTimeout(function(){location.href="menu.php"},0);
						</script>';
				}
				// for($i=0; $i<count($_SESSION['cart']); $i++) {
					
				$TotalPayment = 0;
				foreach($_SESSION['cart'] as $cart => $val) {
					
					$ProdID = $val;
					$Qty = $_SESSION['qty'][$val];
					//echo $testval;

					$q = "SELECT * FROM product WHERE ProductID='$ProdID'";
					$r = @mysqli_query ($dbc,$q);

					if (mysqli_num_rows($r) == 1) {
						
					while ($data = mysqli_fetch_array($r)) {
						
						$Price = $data['Price'];
						$TotalPrice = number_format((double)$Qty*$Price, 2 ,'.', ',');
						$TotalPayment = number_format((double)$TotalPayment+$TotalPrice, 2 ,'.', ',');

						echo "
						<tr>
							<td style=\"border-bottom: 0px\">";
							if (!isset($data['Image'])) {
								echo "<img src=\"includes/images/image_na.png\"";
							} else {
								echo "<img src=\"includes/images/".$data['Image']."\"";
							};
							echo "</td>
							<td rowspan='2'>RM ".$Price."</td>
							<td rowspan='2'>".$Qty."</td>
							<td rowspan='2'><a href='menudetails.php'>RM ".$TotalPrice."</a></td>
						</tr>
						<tr>
							<td style=\"border-top: 0px\">".$data['Name']."</td>
						</tr>
						";
					}} 
				}
				// }
				?>
			 </table>
			
			<table>
				<tr>
					<th style="text-align: left; border: 0px">SHIPPING ADDRESS</th>
				</tr>
				<tr>
					<td style="text-align: left"><?php echo $_SESSION['Address']; ?></td>
				</tr>
			</table>
			<form action="cart.php" method="POST">
			<table>
				<tr>
					<th style="text-align: left; border: 0px">TOTAL PAYMENT</th>
					<th style="text-align: left; border: 0px">PAYMENT METHOD</th>
				</tr>
				<tr>
					<td style="text-align: left">RM<?php echo $TotalPayment; ?></td>
					<td style="text-align: left"><label><?php pmethod(); ?></td>
				</tr>
			</table>

			<table>
				<tr>
					<td style="text-align: right; border: 0px;"><button type="submit" value="submit" class="btn"><a>Proceed to Order</a></button></td>
				</tr>
			</table>
			</form>
		</div>

		<?php
		function pmethod() {
			$Pmethod = array ('Online' => 'Online Payment', 'COD' =>  'Cash On Delivery',);

			echo '<select name="Pmethod">';
			foreach ($Pmethod as $key => $value) {
				echo "<option value=\"$key\">$value</option>\n";
			}
			echo '</select>';
		}
		?>

<?php
include ('includes/footer.html');
?>
