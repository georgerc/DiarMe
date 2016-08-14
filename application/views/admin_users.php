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

        .test123 {
            display: none;
        }

        label {
            font-size: 17px;
        }


        .suspendare button {
            float:right
        }

    </style>
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

<div class="container-fluid">

<div class="container col-md-6" id="lista-useri">
    <table class="table table-hover-red">
        <thead>
        <tr>

            <th style="text-align:center">Username:</th>
            <th style="text-align:center">Email</th>
            <th style="text-align: center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($username as $user) {
            ?>
            <tr>

                <td><span class="suspendare" id="user<?php echo $user['id'] ?>"><?php echo $user['username'];
                        if ($user['suspended'] == '0') {
                            echo '<a href="' . base_url() . 'admin/' . 'suspend_user/' . $user["id"] . '"> <button class="btn btn-primary" type="button" id="suspend" >Suspend user </button></a>';
                        } else {
                            if ($user['suspended'] == '1') {
                                echo '<a href="' . base_url() . 'admin/' . 'resume_user/' . $user["id"] . '"> <button class="btn btn-primary" type="button" id="suspend" >Resume user </button></a>';
                            }
                        } ?>
                </span>

                    <span class="test123" id="input<?php echo $user['id'] ?>">
                         <?php echo form_open("admin/rename_userC") ; ?>
                        <input type="hidden" value="<?php echo $user['username'] ?>" name="current_username"
                               id="current_username"/>
                        <input class="form-control input-sm" type="text" id="newusername" name="newusername"
                               placeholder="New username"/>
                    <input class="btn btn-primary" type="submit" id="submit" name="submit" value="Rename"
                           style="margin-top:10px"/>
                        <?php  echo form_close(); ?>
                    </span>


                </td>
                <td style="border-right: 2px solid #DCDCDC;border-left:2px solid #DCDCDC"><?php echo $user['email'];
                    echo '<button class="btn btn-primary" type="button" id="suspend" data-toggle="modal" data-target="#myModal' . $user["id"] . '" style="float:right">Write Message </button>'; ?></td>
                <td class="btn-group" style="padding-right: 0">
                  <?php
                    echo '<button class="col-sm-3 rename btn btn-primary" type="button" id="rename' . $user['id'] . '" style="text-align:center;padding:6px 10px"  >Rename</button>';
                    echo '<a href="' . base_url() . 'admin/' . 'delete_userC/' . $user["username"] . '"> <button class="col-sm-5 btn btn-primary" type="button" id="delete" style="border-radius:0;text-align:center;padding:6px 10px">Delete Account</button></a>'; ?>

                    <button class="col-sm-4 btn btn-primary" type="button" style="text-align:center;padding:6px 10px">View Journals</button>

                </td>
            </tr>


        <?php } ?>
        </tbody>
    </table>
</div>


    <div class="container col-md-6" style="background-color: yellow">

       Aici ar trebui sa vina jurnalele

    </div>


</div>


<?php foreach ($username as $user) {
?>
<div class="modal fade" id="myModal<?php echo $user['id'] ?>" role="dialog">
    <div class="modal-dialog">


        <div class="modal-content" style="margin-top:15vh">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Its about sending a message</h4>
            </div>
            <div class="modal-body" style="padding:10px;margin:0">
                <div class="modal-body" style="padding:10px;margin:0">
                    <div id="Demo2" style="margin:auto">
                        <?php echo form_open("admin/send_message"); ?>
                        <h2>Send a message to <?php echo $user['username'] ?>:</h2><br>
                        <label for="subject">Subject:</label> <br><input class="form-control" type="text"
                                                                         name="subject" id="subject"
                                                                         style="width:40%"/>
                        <br><br>
                        <input type="hidden" value="<?php echo $user['email'] ?>" name="email" id="email">

                        <label for="message">Your message:</label><textarea class="form-control" rows="7"
                                                                            id="message" name="message"
                                                                            style="resize:none"></textarea>
                        <br>
                        <input class="btn btn-primary btn-lg" type="submit" id="submit">
                        <?php echo form_close() ?>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php } ?>

    <script>
        <?php foreach ($username as $user) {
        ?>
        $('#rename<?php echo $user['id'] ?>').click(function () {
            $('#user<?php echo $user['id'] ?>').toggle();
            $('#input<?php echo $user['id'] ?>').toggle();

            if ($('#rename<?php echo $user['id'] ?>').text() == "Rename")
                $('#rename<?php echo $user['id'] ?>').text("Close");
            else $('#rename<?php echo $user['id'] ?>').text("Rename");

        });
        <?php } ?>

    </script>




</body>
</html>
