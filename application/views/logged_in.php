<!DOCTYPE html>
<html>
<head>
	<title>Welcome!</title>
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
	<p>You are now logged in! Click <a href='/users/logout'>here</a> to log out.</p>
		<fieldset>
		    <legend>User Information</legend>
		    <p>Name: <?= $user['user_name'] ?></p>
		    <p>Email: <?= $user['user_email'] ?></p>
		    <!-- <input type="hidden"> -->
		</fieldset>
	</div>
</body>
</html>