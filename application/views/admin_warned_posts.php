<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/readmore.min.js"></script>
<style>
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
                <li>
                    <a class="active" onclick="location.href = '<?php echo site_url("admin/public_posts"); ?>';">Public
                        Posts<span class="badge"><?php echo $count_public_posts ?></a>
                </li>
                <li class="active">
                    <a class="active" onclick="location.href = '<?php echo site_url("admin/warned_posts"); ?>';">Warned
                        Posts<span class="badge"><?php echo $count_warned_posts ?></a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a onclick="location.href = '<?php echo site_url("home/logout"); ?>';"><span
                            class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAV BAR -->
<!-- WARNED POSTS CONTENT -->
<div class="container-fluid">

    <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Title</th>
            <th>Text</th>
            <th style="width:100px">Date:Time</th>
            <th style="width:162px">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($warn_posts as $wposts) { ?>
            <td> <?php echo $wposts['username'] ?> </td>
            <td><?php echo $wposts['journal_title'] ?> </td>
            <td class="journal-text" style="white-space:pre-line"><?php echo $wposts['journal_text'] ?></td>
            <td style="width:100px"><?php echo $wposts['odata'] ?></td>
            <td  style="width:162px"><?php echo '<a href="' . base_url() . 'admin/' . 'delete_post_warnedC/'.$wposts['id']. '"> <button class="btn btn-primary" type="button" id="suspend" >Delete</button></a>'; ?><?php echo '<a href="' . base_url() . 'admin/' . 'dewarn_postC/'.$wposts['id']. '"> <button class="btn btn-primary" type="button" id="suspend" >Unwarn</button></a>'; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- END WARNED POSTS -->
<script>
    $('.journal-text').readmore({
        speed: 125,
        collapsedHeight: 85,
        lessLink: '<a href="#">Read less</a>'
    });

</script>
</body>
</html>

