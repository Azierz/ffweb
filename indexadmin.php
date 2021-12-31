<?php
$page_title = 'Welcome back!';
$page_text = 'Admin Home Page';
include ('includes/aheader.php');

if (empty($_SESSION['AdminID'])) {
	echo '
		<script>
		window.alert("\nPLEASE LOGIN FIRST!");
		setTimeout(function(){location.href="login.php"},0);
		</script>';
}
?>

<h1>Category</h1>


	<!-- <img src="includes/images/pastel.png" style="width:100%"> -->
	<div class="menu">
		<table>
		  <tr>
		    <tH>Product Maintenance</tH>
		    <tH>Manage Customer</tH>
		    <tH>Manage Order</tH>
				<tH>Admin Maintenance</tH>
		    <tH>Check Review</tH>
		  </tr>
			<tr>
				<td><button class="btn"><a href="#">GO</a></button></td>
				<td><button class="btn"><a href="#">GO</a></button></td>
				<td><button class="btn"><a href="#">GO</a></button></td>
				<td><button class="btn"><a href="#">GO</a></button></td>
				<td><button class="btn"><a href="#">GO</a></button></td>
			</tr>
		</table>
	</div>
	<div class="btn-group">
			<button><a href="#">ADD</a></button>
			<button><a href="#">EDIT</a></button>
			<button><a href="#">DELETE</a></button>
	</div>



<?php
include ('includes/footer.html');
?>
