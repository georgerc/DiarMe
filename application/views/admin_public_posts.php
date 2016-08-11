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
            <a class="navbar-brand" onclick="location.href = '<?php echo site_url("admin"); ?>';">Administration Panel</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a onclick="location.href = '<?php echo site_url("admin/users"); ?>';">Users</a></li>
                <li class="dropdown">
                    <a class="active" href="#">Announcements</a>
                <li class="active">
                    <a href="">Public Posts</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a onclick="location.href = '<?php echo site_url("home/logout"); ?>';"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <table class="table table-hover-red">
        <thead>
        <tr>


            <th>Username</th>
            <th>Title</th>
            <th>Text</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($public_journals as $p_journals) {
            ?>
            <tr>
                <td><?php echo $p_journals['username'] ?></td>
                <td><?php echo $p_journals['journal_title'] ?></td>
                <td class="journal-text"><?php echo $p_journals['journal_text'] ?></td>

            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<script>

    $('.journal-text').readmore({
        speed: 125,
        collapsedHeight: 50,
        lessLink: '<a href="#">Read less</a>'
    });
</script>
</body>
</html>