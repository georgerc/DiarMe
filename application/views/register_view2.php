<!doctype html>
	<html>
		<head>
			<title>New account</title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/register.css" />
		</head>
<body>
<div class="outer">
<div class="middle">
<div class="inner">
	<div id="signin" ><br>
		<h3>Please register in order to be able to use our website<h3>
		
		<br>
            <?php echo form_open('register/register_user'); ?> 
        <label>Username</label>
		<input name="username" value="<?php echo set_value('username'); ?>" type="text" /><p></p>
		<label>Email</label>
		<input  name="email"value="<?php echo set_value('email'); ?>" type="email"><p></p>
		<label>Name</label>
		<input  name="firstname" value="<?php echo set_value('firstname'); ?>"type="text"><p></p>
		<label>Last Name</label>
		<input  name="lastname" value="<?php echo set_value('lastname'); ?>"type="text"><p></p>
		<label>Password</label>
		<input  name="password" value="<?php echo set_value('password'); ?>"type="password" > <p></p>
		<label>Confirm password</label>
		<input  name="password_conf" type="password"> <p></p>
		<input name="submit" type="submit" value=" Register">
             <?php echo validation_errors('<p class="error"?'); ?>
            <?php echo form_close(); ?>
         
                </form>

			

	</div>
</div>
</div>
</div>
</body>
</html>