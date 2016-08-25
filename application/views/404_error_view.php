<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>404 Not Found</title>
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
        #gif {
            width: 100%;
            text-align: center;
            margin-top: 130px;
        }

        #text {
            width: 100%;
            text-align: center;
        }
        #gif img {
            width:100%;
        }
        @media only screen and (min-width: 751px) {
            #gif img {
                width:500px;
            }

        }
    </style>

</head>

<body>
<div id="gif">
    <img src="<?php echo base_url() ?>/img/bookflip.gif" >
</div>
<div id="text">
    <h3 style="color:white;">Oops,it appears you have taken a wrong turn!</h3>
    <h4 style="color:white">We weren't able to find what you requested.</h4>
    <h4 style="color:red">(Error 404)</h4>
    <button class="btn btn-primary" onclick="location.href = '<?php echo base_url() ?>home'">Click here to go home</button>
</div>
</body>
</html>