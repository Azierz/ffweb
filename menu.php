<?php
$page_title = 'Menu';
$page_text = 'Menu';
include ('includes/header2.php');

if (empty($_SESSION['CustID'])) {
	echo '
		<script>
		window.alert("\nPLEASE LOGIN FIRST!");
		setTimeout(function(){location.href="login.php"},0);
		</script>';
}
?>

<h1>Fruity Fruit Menu</h1>

<div class="menu">
	<table border="1">
		<tr>
			<th>Fruit(s)</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Add To Cart</th>
		</tr>
		<?php
		require ('includes/constants.php');
		
		if(!empty($_GET["search"])){
			$search = $_GET["search"];
		} else {
			$search = "";
		}

		$q = "SELECT * FROM product WHERE Name LIKE '%$search%'";
		$r = @mysqli_query ($dbc,$q);

		if (!mysqli_num_rows($r) == 1) {
			echo '<tr><td colspan="4">ALL PRODUCT OUT OF STOCK</td></tr>';
		} else {
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
				<td rowspan='2'>".$data['Quantity']."</td>
				<td rowspan='2'>";
				$dt = $data["ProductID"];

				if (isset($_SESSION["qty"][$dt])) { //check cart for specific product
					if ($data['Quantity'] > 0 && $_SESSION["qty"][$dt] < $data['Quantity']) {
						echo '
						<form action="menudetails.php" method="GET">
							<input type="text" name="ProductID" value="'.$data["ProductID"].'" hidden>
							<input type="submit" name="submit" value="More Details" />
						</form>';
					} else {
						echo "Out of Stock";
					};
				} else {
					if ($data['Quantity'] > 0) {
						echo '
						<form action="menudetails.php" method="GET">
							<input type="text" name="ProductID" value="'.$data["ProductID"].'" hidden>
							<input type="submit" name="submit" value="More Details" />
						</form>';
					} else {
						echo "Out of Stock";
					};
				}
				
			echo "</td>
			</tr>
			<tr>
				<td style=\"border-top: 0px\">".$data['Name']."</td>
			</tr>
			";
		}}
		?>
	</table>
</div>
<?php
include ('includes/footer.html');
?>
