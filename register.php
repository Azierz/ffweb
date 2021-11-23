<?php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include ('includes/header2.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.

	// Check for a first name:
	if (empty($_POST['name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = trim($_POST['name']);
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = trim($_POST['pass1']);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	// Validate the phone no:
	if (empty($_POST['phone_no'])) {

		$errors[] = 'You forgot to enter your phone number.';
	} else {
		$pn = trim($_POST['phone_no']);

	}

	// Check for a last name:
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$ln = trim($_POST['address']);
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = trim($_POST['email']);
	}

	if (empty($errors)) { // If everything's OK. ($fn && $ln && $e)

		// Register the user in the database...

		require ('mysqli_connect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO student (first_name, last_name, phone_no, email, Programme, password, registration_date) VALUES ('$fn', '$ln', '$pn', '$e', '$prg', SHA1('$p'), NOW() )";
		$r = mysqli_query ($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered.</p>';

		} else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		include ('includes/footer.html');
		exit();

	} else { // Report the errors.

		echo '<h1>Error!</h1>
		<div id = "errors">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</div>
		<div id = "errors">Please try again.</div> <p><br /></p>';

	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<h1>Register</h1>
<form action="register.php" method="post">
	<table border="0">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" name="name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></td>
		</tr>
		<tr>
			<td>Phone Number:</td>
			<td><input type="text" name="phone_no" size="20" maxlength="40" value= "<?php if (isset($_POST['phone_no'])) echo $_POST['phone_no']; ?>" /></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><input type="text" name="address" size="40" maxlength="100" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"  /></td>
		</tr>
		<tr>
			<td>Email Address:</td>
			<td><input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Register" /></td>
		</tr>
	</table>
</form>

<?php include ('includes/footer.html'); ?>
