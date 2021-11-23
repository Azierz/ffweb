<!DOCTYPE html>
<html>
<header> 
<img src = "include/fff.jpg">
<title> Fruity Fruit Website </title>

<style>
		body {background-color:white; background-image:url("include/pastel.png") ;}
		h1{color: black; margin: 0px auto 0px;
		font-size: 25px; font-weight: 800;
		text-align: center;}
		
		form {color:black;margin: 100px auto; width: 300px;
		padding: 30px 25px; background: white;}
</style>

<body>


<form name="LoginForm" action="HDHloginVerify.php" method="post">
	<h1>LOGIN</h1>
	<br>
	<center><br>
	Username 
	<input type="text" name="userName" maxlength="10" size="11" required>
	<br><br>
	Password 
	<input type="password" name="userPwd" maxlength="10" size="11" required>
	<br><br>
	
	
	<br><br>
	<input type="reset" value="Cancel">
	<input type="submit" value="Login">
	</center>

</form>


</header>

</html>