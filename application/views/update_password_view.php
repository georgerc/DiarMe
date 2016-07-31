<!DOCTYPE html>
<html>
<head>
    <title>Discover More</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/index.css"/>

    <style>
        label {
            font-size:20px;
            color:white;
        }
        h2 {
            font-size:50px;
            color:white;
            margin-bottom: 50px;
        }
        #submit {
            font-size:24px
        }
        input[type=email],input[type=password] {
            width: 70%;
            margin: 15px auto;
        }
        input[type=submit] {margin: 20px auto;}
    </style>
</head>
<body>


<div class="w3-container login-box" id="update_password_form"  >
    <h2 style="text-align:center">Changing your pasword</h2>
    <div  style="background-color: rgba(0,0,0,0.6);width:100%;padding-top: 40px;">
    <?php echo form_open('forgot_password_C/update_password'); ?>
   <!-- <form action="/scripts/update_password" method="POST"> -->

    <div class="w3-center">
        <label for="email">Email:</label><br>
        <?php if (isset($email_hash, $email_code)) { ?>

            <input type="hidden" value="<?php echo $email_hash ?>" name="email_hash"/>
            <input type="hidden" value="<?php echo $email_code ?>" name="email_code"/>
        <?php } ?>

        <input type="email" value="<?php echo (isset($email)) ? $email : ''; ?>" name="email" />

    </div>

    <div  class="w3-center">
        <label for="password">New Password: </label><br>
        <input type="password" id="password" value="" name="password"/>
    </div>
    <div class="w3-center">
        <label for="password_conf"> New Password Again: </label><br>
        <input type="password" value="" name="password_conf" id="password_conf" name="password_conf" />
    </div>

    <div class="w3-center">
        <div style="color:red;font-size:22px"><?php echo validation_errors(); ?></div>
        <input class="w3-btn w3-hover-white"type="submit" id="submit" name="submit" value="Update My Password" style="height:50px;line-height: 40px"/>

    </div>
        <?php echo form_close(); ?>

    </div>



</div>

</body>