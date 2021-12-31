<?php
$page_title = 'Menu Details';
$page_text = 'Menu Details';
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
	$_SESSION['cart'] = array();
	$CartID = $_POST['cart'];

	require ('includes/constants.php');

	$q = "SELECT * FROM product WHERE ProductID='$CartID'";
	$r = @mysqli_query ($dbc,$q);

	if (!mysqli_num_rows($r) == 1) {
		echo '<script>
		window.alert("\nERROR!\nPLEASE TRY AGAIN LATER.");
		setTimeout(function(){location.href="menu.php"},0);
		</script>';
	} else {
		$CartName = $data['Name'];
		$CartImage = $data['Image'];
		$CartPrice = $data['Price'];
		$CartQuantity = 1;

		array_push($_SESSION['cart'],$CartImage,$CartName,$CartPrice,$CartQuantity);
		echo '<script>
		window.alert("\nSUCCESS!\nPRODUCT ADDED TO CART.");
		setTimeout(function(){location.href="menu.php"},0);
		</script>';
	}}
?>

<h1>Fruity Fruit Menu Details</h1>

<div class="menudetails">
	<div class="row">

	  	<div class="column">
		<table>
			<?php
			require ('includes/constants.php');

			$ProductID = $_GET["ProductID"];
			
			$q = "SELECT * FROM product WHERE ProductID='$ProductID'";
			$r = @mysqli_query ($dbc,$q);
			
			if (!mysqli_num_rows($r) == 1) {
				echo '<tr><td colspan="3">PRODUCT OUT OF STOCK</td></tr>';
			} else {
			while ($data = mysqli_fetch_array($r)) {
				echo '
				<tr>
					<td>';
					if (!isset($data["Image"])) {
						echo '<img src="includes/images/image_na.png"/>';
					} else {
						echo '<img src="includes/images/'.$data["Image"].'"/>';
					};
					echo '</td>
					<tr>
						<td>FRUIT DESCRIPTION</td>
					</tr>
					</table>
					</div>
					
					<div class="column">
					<table>
						<tr>
							<th colspan="2">'.$data["Name"].'</th>
						</tr>
						<tr>
							<td colspan="2">Price: RM '.$data["Price"].'</td>
						</tr>
						<tr>
							<td>Quantity Left:<br><br>'.$data["Quantity"].'</td>
							<td>
							<form action="menudetails.php" method="POST">
								<input type="text" name="cart" value="'.$data["ProductID"].'" hidden>
								<input type="submit" name="submit" value="Add To Cart" />
							</form>
							</td>
						</tr>
					</table>
					</div>';
			}}
			?>
			<!-- <tr>
				<td><img src="includes/images/image_na.png"/>FRUIT IMAGE</td>
			</tr>
			<tr>
				<td>FRUIT DESCRIPTION</td>
			</tr>
		</table>
	  	</div>
		
		<div class="column">
	    <table>
			<tr>
				<th colspan='2'>FRUIT NAME</th>
			</tr>
			<tr>
				<td colspan='2'>FRUIT PRICE</td>
			</tr>
			<tr>
				<td>QUANTITY</td>
				<td>ADD TO CART</td>
			</tr>
	    </table>
	  	</div> -->
	</div>
</div>
<?php
include ('includes/footer.html');
?>
