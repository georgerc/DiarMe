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
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" onclick="location.href = '<?php echo site_url("admin"); ?>';">Administration
                Panel</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Users</a></li>
                <li class="dropdown">
                    <a class="active" href="#">Announcements </a>
                <li>
                    <a class="active" onclick="location.href = '<?php echo site_url("admin/public_posts"); ?>';">Public
                        Posts</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a onclick="location.href = '<?php echo site_url("home/logout"); ?>';"><span
                            class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <li><a onclick="location.href = '<?php echo site_url("home/logout"); ?>';"><span
                            class="glyphicon glyphicon-user"></span> Create User</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <table class="table table-hover-red">
        <thead>
        <tr>

            <th>User Picture</th>
            <th>Username:</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($username as $user) {
            ?>
            <tr>
                <td>------</td>
                <td><?php echo $user['username'];
                    if ($user['suspended'] == '0') {
                        echo '<a href="' . base_url() . 'admin/' . 'suspend_user/' . $user["id"] . '"> <button type="button" id="suspend" >Suspend user </button></a>';
                    } else {
                        if ($user['suspended'] == '1') {
                            echo '<a href="' . base_url() . 'admin/' . 'resume_user/' . $user["id"] . '"> <button type="button" id="suspend" >Resume user </button></a>';
                        }
                    } ?></td>
                <td><?php echo $user['email'];
                    echo '<a href="' . base_url() . 'admin/' . 'suspend_user/' . $user["id"] . '"> <button type="button" id="suspend" >Write Message </button></a>'; ?></td>

            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

</body>
</html>
