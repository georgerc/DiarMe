<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="login.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/login.css" />
			<title>Login Form in PHP with Session</title>
		</head>
		<body>
<div id="login">
		<h2>Login</h2>
        <?php echo form_open('verifylogin'); ?>
		<label>Username :</label>
		<input id="name" name="username"  type="text"><p></p>
		<label>Password :</label>
		<input id="password" name="password" type="password"> <p></p>
		<input name="submit" type="submit" value=" Login ">
        <?php echo validation_errors('<p class="error">'); ?>
    
	</form>
<p></p>
<a href="<?php echo site_url('register'); ?>"> Create a new account</a>
</div>
		</body>
	</html>