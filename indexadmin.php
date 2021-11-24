<?php
$page_title = 'Welcome back!';
$page_text = 'Admin Home Page';
include ('includes/aheader.php');
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
			<button class="btn"><a href="#">ADD</a></button>
			<button class="btn"><a href="#">EDIT</a></button>
			<button class="btn"><a href="#">DELETE</a></button>
	</div>



<?php
include ('includes/footer.html');
?>
