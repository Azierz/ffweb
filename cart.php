<?php
$page_title = 'Shopping Cart';
$page_text = 'Shopping Cart';
include ('includes/header2.php');
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

				if (empty($_SESSION['cartTEST'])) {
					echo '
						<script>
						window.alert("\nShopping Cart Empty!");
						setTimeout(function(){location.href="menu.php"},0);
						</script>';
				}
				for($i=0; $i<count($_SESSION['cartTEST']); $i++) {
					
				
				foreach($_SESSION['cartTEST'][$i] as $cart => $val) {
					$testval = $val;
					echo $testval;
					
					

					$q = "SELECT * FROM product WHERE ProductID='$testval'";
					$r = @mysqli_query ($dbc,$q);

					if (mysqli_num_rows($r) == 1) {
						
					while ($data = mysqli_fetch_array($r)) {
						echo "
						<tr>
							<td style=\"border-bottom: 0px\">";
							if (!isset($data['Image'])) {
								echo "<img src=\"includes/images/image_na.png\"";
							} else {
								echo "<img src=\"includes/images/".$data['Image']."\"";
							};
							echo "</td>
							<td rowspan='2'>RM ".$data['Price']."</td>
							<td rowspan='2'>TOTAL QUANTITY</td>
							<td rowspan='2'><a href='menudetails.php'>TOTAL PRICE</a></td>
						</tr>
						<tr>
							<td style=\"border-top: 0px\">".$data['Name']."</td>
						</tr>
						";
					}} 
				}} ?>
			 </table>
			
			<table>
				<tr>
					<th style="text-align: left; border: 0px">SHIPPING ADDRESS</th>
				</tr>
				<tr>
					<td style="text-align: left">CUSTOMER ADDRESS</td>
				</tr>
			</table>
			<table>
				<tr>
					<th style="text-align: left; border: 0px">TOTAL PAYMENT</th>
					<th style="text-align: left; border: 0px">PAYMENT METHOD</th>
				</tr>
				<tr>
					<td style="text-align: left">RMXX.XX</td>
					<td style="text-align: left"><label><?php pmethod(); ?></td>
				</tr>
			</table>

			<table>
				<tr>
					<td style="text-align: right; border: 0px;"><button class="btn"><a href="checkout.php">CHECKOUT</a></button></td>
				</tr>
			</table>
		</div>

		<?php
		function pmethod() {
			$Programme = array ('Online' => 'Online Payment', 'COD' =>  'Cash On Delivery',);

			echo '<select name="Pmethod">';
			foreach ($Programme as $key => $value) {
				echo "<option value=\"$key\">$value</option>\n";
			}
			echo '</select>';
		}
		?>

<?php
include ('includes/footer.html');
?>
