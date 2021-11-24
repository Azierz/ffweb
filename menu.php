<?php
$page_title = 'Menu';
$page_text = 'Menu';
include ('includes/header2.php');
?>

<h1>Fruity Fruit Menu</h1>

<div class="menu">
	<table border="1">
		<tr>
			<th>Fruit(s):</th>
			<th>Price:</th>
			<th>Quantity</th>
			<th>Add To Cart</th>
		</tr>
		<?php
		require ('includes/constants.php');

		$q = "SELECT * FROM product";
		$r = @mysqli_query ($dbc,$q);

		if (!mysqli_num_rows($r) == 1) {
			echo '<tr><td colspan="3">ALL PRODUCT OUT OF STOCK</td></tr>';
		} else {
		while ($data = mysqli_fetch_array($r)) {
			echo "
			<tr>
				<td>image</td>
				<td rowspan='2'>RM ".$data['Price']."</td>
				<td rowspan='2'>".$data['Quantity']."</td>
				<td rowspan='2'>";
				if ($data['Quantity'] > 0) {
					echo "<a href=#>See Detail</a>";
				} else {
					echo "Out of Stock";
				};
			echo "</td>
			</tr>
			<tr>
				<td>".$data['Name']."</td>
			</tr>
			";
		}}
		?>
	</table>
</div>
<?php
include ('includes/footer.html');
?>
