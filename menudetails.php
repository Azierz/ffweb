<?php
$page_title = 'Menu Details';
$page_text = 'Menu Details';
include ('includes/header.php');
?>

<h1>Fruity Fruit Menu Details</h1>

<div class="menudetails">
	<div class="row">
	  <div class="column">
	    <table>
	      <tr>
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
	  </div>
	</div>
</div>
<?php
include ('includes/footer.html');
?>
