<?php

$page_title = 'Admin Login Form';
$page_text = 'Admin Login Form';
include ('includes/aheader.php');

if (!empty($_SESSION['AdminID'])) {
	echo '
		<script>
		window.alert("\nALREADY LOGGED IN!");
		setTimeout(function(){location.href="indexadmin.php"},0);
		</script>';
}


// Run after submit form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Make the connection to the database
	require ('mysqli_connect.php');

	$errors = array(); // Initialize error array.

	// Validate the email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email.';
	} else {
		$em = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

	// Validate the password:
	if (empty($_POST['pass'])) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
	}

	if (empty($errors)) { // If everything's OK.

		// Query for admin
		$q = "SELECT admin_id, email FROM admin WHERE email='$em' AND password=SHA1('$p')";
		$r = @mysqli_query ($dbc, $q); // Run the query.

		// Check the result:
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);

			// Set the session data:
			session_start();
			$_SESSION['admin_id'] = $row['admin_id'];
			$_SESSION['email'] = $em;

			// Redirect user
			header("Location:indexadmin.php");

		} else { // Not a match!
			$errors[] = 'The email and password entered do not match those on file.';
		}
	} // End of empty($errors) IF.

	mysqli_close($dbc); // Close the database connection.

	if ($errors) { // Report the errors.
		echo '<h1>Error!</h1>
		<div id ="errors">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br/>";
		}
		echo '</div>
		<div id = "errors">Please try again.</div>'; // Close div "errors"
	}

} // End of the main submit conditional.

// Display the form:?>
<h1>ADMIN LOGIN FORM</h1>
<form action="loginadmin.php" method="post">
	<table style="font-size: 100%">
		<tr>
			<td><p>Email</p></td>
			<td><p><input type="text" name="email" size="20"/></p></td>
		</tr>

		<tr>
			<td><p>Password</p></td>
			<td><p><input type="password" name="pass" size="20"/></p></td>
		</tr>
	</table>
	<p align="right"><input type="submit" name="submit" value="Login" /></p>
</form>

<?php include ('includes/footer.html'); ?>
