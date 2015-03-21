<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration</title>
	<style type="text/css">
	.container {
		margin: 0 auto;
		width: 500px;
	}

	p {
		margin-top: 10px;
		margin-bottom: 10px;
	}

	.error {
		color: red;
	}

	.success {
		color: green;
	}
	</style>
</head>
<body>
	<div class="container">
		<p><form action="users/login" method="post">
		  	<fieldset>
			    <legend>Login</legend>
<?php 
				if($this->session->flashdata("login_error")) 
				{
					echo $this->session->flashdata("login_error");
				}
?>
			    <p>Email: <input type="text" name="email"></p>
			    <p>Password: <input type="password" name="password"></p>
			    <input type="submit" value="Login">
			    <!-- <input type="hidden"> -->
		  	</fieldset>
		</form></p>
		<p><form action="/users/register" method="post">
		  	<fieldset>
			    <legend>Register</legend>	    
<?php 
				if($this->session->flashdata("register_error")) 
				{
					echo $this->session->flashdata("register_error");
				}
?>
<?php
				if($this->session->flashdata("register_success")) 
				{
					echo $this->session->flashdata("register_success");
				}
?>
			    <p>First Name: <input type="text" name="first_name"></p>
			    <p>Last Name: <input type="text" name="last_name"></p>
			    <p>Email: <input type="text" name="email"></p>
			    <p>Password: <input type="password" name="password"></p>
			    <p>Confirm Password: <input type="password" name="confirm_password"></p>
			    <input type="submit" value="Register">
			    <!-- <input type="hidden"> -->
		  	</fieldset>
		</form></p>
	</div>
</body>
</html>