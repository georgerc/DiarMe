<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .stats {
            opacity:0;
            text-align: center;
            font-size:20px;


            border-radius:20px;
            color:white
        }
        .badge {
            margin-left:5px;
        }

    </style>
</head>
<body onload="startTime()">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" onclick="location.href = '<?php echo site_url("admin"); ?>';">Administration Panel</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav ">
                <li ><a onclick="location.href = '<?php echo site_url("admin/users"); ?>';">Users<span class="badge"><?php echo $count_users; ?></span></a></li>
                <li class="dropdown">

                    <a class="active" onclick="location.href = '<?php echo site_url("admin/public_posts"); ?>';">Public Posts<span class="badge"><?php echo $count_public_posts ?></span></a>
                </li>
                <li >
                    <a class="active" onclick="location.href = '<?php echo site_url("admin/warned_posts"); ?>';">Warned Posts<span class="badge"><?php echo $count_warned_posts ?></span></a>
                </li>
                <li class="dropdown">
                <a class="active" href="#">Announcements </a>
                <li >
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a onclick="location.href = '<?php echo site_url("home/logout"); ?>';"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>




<div class="container-fluid" style="text-align: center">
    <h1>Welcome back,<?php echo $this->session->userdata('username')?>.</h1>
    <h3>It is currently <span id="txt" style="color:red"></span>.</h3>


<!--
<h3>Here are some stats of our website:</h3>
    <div class="col-md-4 stats">
        <div class="col-md-9 stats" style="background-color:blue;margin-left:15%">Number of journals written:<br><span id="numar">64</span></div>
    </div>

    <div class="col-md-4 stats" >
        <div class="col-md-9 stats" style="background-color:blue;margin-left:15%;">Number of registered accounts:<br><span id="numar">24</span></div>
    </div>

    <div class="col-md-4 stats" >
        <div class="col-md-9 stats" style="background-color:blue;margin:15%">Number of shared journals:<br><span id="numar">24</span></div>
    </div>
    -->

</div>



<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    $(document).ready(function () {
       $('.stats').animate({
           top:'50px',
           opacity:'1'
       },600);
    });

</script>
</body>
</html>