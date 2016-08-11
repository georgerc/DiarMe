<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DiarMe</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>


    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">


</head>

<body>


<div class="form">

    <img src="<?php echo base_url() ?>img/logo.png"/>


    <!-- BEGIN FORMULAR INREGISTRARE -->
    <?php $attributes = array('class' => 'register-form');
    echo form_open('user/register_user', $attributes); ?>

    <label for="username">Username</label>
    <input type="text" id="username" name="username" required/>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required/>

    <label for="password_conf">Confirm password</label>
    <input id="password_conf" name="password_conf" type="password" required/>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required/>

    <button>Sign Up</button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>

    <?php echo form_close(); ?>

    <!-- END FORMULAR INREGISTRARE -->

    <!-- BEGIN FORMULAR RESETARe -->
    <?php $attributes = array('class' => 'forgot-password');
    echo form_open('forgot_password_C/reset_password', $attributes) ?>

    <label>Type your email</label>
    <input type="email" name="email" id="email"/>
    <button>Reset password</button>
    <p class="message2">Remembered your password? <a href="#">Sign In</a></p>
    <?php echo form_close(); ?>

    <!-- END FORMULAR RESETARE -->

    <!-- BEGIN FORMULAR LOGARE -->
    <?php $attributes = array('class' => 'login-form');
    echo form_open('user/login', $attributes); ?>

    <input type="text" placeholder="Username" name="username" id="username"/>
    <input type="password" placeholder="Password" name="password" id="password "/>

    <button>Login</button>
    <?php echo '<span style="color:red;font-size:19px">' . validation_errors() . '</span>' ?>

    <p class="message">Not registered? <a href="#" id="create">Create an account</a></p>
    <p class="message2">Forgot your password? <a href="#" id="reset">Reset password</a></p>
    <?php echo form_close(); ?>

    <!-- END FORMULAR LOGARE -->
</div>


<script>
    $('.message a').click(function () {
        $('.login-form').animate({height: "toggle", opacity: "toggle"}, "slow");
        $('.register-form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    $('.message2 a').click(function () {
        $('.forgot-password').animate({height: "toggle", opacity: "toggle"}, "slow");
        $('.login-form').animate({height: "toggle", opacity: "toggle"}, "slow");

    });

    var viewportHeight = $(window).height();
    var formHeight = $('.form').height();
    var element = $('.form');
    $('#height').text(viewportHeight);
    element.css('margin-top', (viewportHeight - formHeight) / 4 + 'px');

    $(window).resize(function () {
        var viewportHeight = $(window).height();
        var formHeight = $('.form').height();
        var element = $('.form');
        element.css('margin-top', (viewportHeight - formHeight) / 4 + 'px');
    });
</script>


</body>
</html>
