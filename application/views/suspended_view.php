<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Suspended message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>
        body {
            background-color: #4d4d4d;
        }
        .suspended-text {
            text-align: center;
            color: red;
            background-color:#1A1A1B;
            width: 50%;
            margin: 10px auto;
            padding:10px;
        }

        .logo-pic {
            margin: 0 auto;
            width: 250px;
            height: 250px;
            margin-top: 100px;
        }

        .logo-pic img {
            width: 100%;
            height: 100%;
        }
        a {
            text-decoration: none;
            color:white;
        }
    </style>
</head>

<body>

<div class="logo-pic">
    <img src="<?php echo base_url() ?>img/logo.png"/>
</div>


<div class="suspended-text">
    <h1>Your account has been temporarily suspended</h1>
    <h4>You have broken a morale rule.</h4>
    <h5>If you think this was a mistake, please contact us at <a href="#">diarme@diarme.com</a></h5>
    <button onclick="location.href = '<?php echo site_url("home/logout"); ?>'" class="logout btn btn-primary">Logout</button>
</div>


</body>
</html>