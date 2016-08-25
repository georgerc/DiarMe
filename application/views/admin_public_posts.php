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
    <script src="<?php echo base_url() ?>js/readmore.min.js"></script>
<style>
    .journal-text {
        white-space: pre-line;
    }
    .tabel {
        margin-left:0;

    }
    .tabel button {
        margin-bottom:15px;
    }
    .badge {
        margin-left:5px;
    }
</style>
</head>
<body>
<!-- NAV BAR -->
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
                <li><a onclick="location.href = '<?php echo site_url("admin/users"); ?>';">Users<span class="badge"><?php echo $count_users; ?></span></a></li>
                <li class="dropdown active">

                    <a href="" >Public Posts<span class="badge"><?php echo $count_public_posts ?></a>
                </li>
                <li >
                    <a class="active" onclick="location.href = '<?php echo site_url("admin/warned_posts"); ?>';">Warned Posts<span class="badge"><?php echo $count_warned_posts ?></a>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a onclick="location.href = '<?php echo site_url("home/logout"); ?>';"><span
                            class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAV BAR -->


<h1>Here are all the posts that the users chose to share:</h1>
<!-- PUBLIC POSTS CONTENT -->
<div class="container-fluid tabel">
    <table class="table table-hover-red">
        <thead>
        <tr>


            <th>Username</th>
            <th>Title</th>
            <th>Text</th>
            <th style="width:250px;">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($public_journals as $p_journals) {
            ?>
            <tr>

                <td><?php echo $p_journals['username'] ?></td>
                <td><?php echo $p_journals['journal_title'] ?></td>
                <td class="journal-text"><?php echo $p_journals['journal_text'] ?></td>
                <td style="width:250px;"><?php echo '<a href="' . base_url() . 'admin/' . 'delete_postC/'.$p_journals['id']. '"> <button class="btn btn-primary" type="button" id="suspend" >Delete</button></a>'; ?>
                  <?php  echo  '<a href="' . base_url() . 'admin/' . 'warn_postC/'.$p_journals['id'].'/'.$p_journals['username']. '"> <button class="btn btn-primary" type="submit" id="suspend" >Warning</button></a><input class="form-control input-sm" type="text" id="Warning" name="newusername"
       placeholder="Warning Message"/>'; ?>
                    <?php form_close() ?>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>

<!-- END PUBLIC POSTS CONTENT -->






<script>

    $('.journal-text').readmore({
        speed: 125,
        collapsedHeight: 85,
        lessLink: '<a href="#">Read less</a>'
    });
</script>
</body>
</html>