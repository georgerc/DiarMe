<!DOCTYPE html>
<html>
<head>
    <title>Discover More</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/discover.css"/>

    <style type="text/css">
        li {
            width: 90%;
            margin: 0 auto 0.5em auto;
        }

    </style>

</head>

<body style="font-family:raleway;min-height: 94.79999vh">


<div class="w3-animate-right w3-card-8 w3-row w3-center userbar"
     style="background-color:rgba(143,143,143, 0.7);color:white;height:110px;">
    <br>
    <p style="font-size:20px">Browsing as: <span style="color:#00ADB5"><?php echo $this->session->userdata('username'); ?></span></p>
    <button onclick="location.href = '<?php echo base_url() ?>home'" class="w3-btn w3-hover-white"
            style="width:35%">Home
    </button>
    <button onclick="location.href = '<?php echo base_url() ?>home/logout';" class="w3-btn w3-hover-white"
            style="width:35%">Sign Out
    </button>
</div>


<div>

    <div class="journal-list w3-animate-zoom">

        <?php $k = 6 * ($page - 1) + 1;
        foreach ($posts as $post) {
            ?>
            <div class="journal-entry w3-bluew3-card-8" >
                <img class="w3-card-4 w3-circle" src="<?php echo base_url(); ?>uploads/<?php echo $post->username ?>.jpg" style="width:80px;height:80px;position:relative;left:-120px;top:72px;">
                <div id="toggler">

                    <span class="entry-number"><?php echo $k.".";
                        $k++ ?> </span>

                    <span class="journal-title"><?php echo $post->journal_title ?> </span>


                </div>


                <div class="journal-text">
                    <?php echo $post->journal_text ?>

                    <div class="journal-footer" style="background-color: #00ADB5;text-align:right">
                        <span class="username">By: <?php echo $post->username ?></span>
                        <span >on <?php echo $post->odata ?></span>
                    </div>

                </div>



            </div>
        <?php } ?>

        <div class="w3-center" style="width:100%">
            <?php
            if ($result < 7) echo '<a href="' . base_url() . 'post/discover/1" id="1" class="pagination w3-center">1</a>';
            else if ($result < 13) {
                echo '<a href="' . base_url() . 'post/discover/1" id="1" class="pagination w3-center">1</a>';
                echo '<a href="' . base_url() . 'post/discover/2" id="2" class="pagination w3-center">2</a>';
            } else if ($result < 19) {
                echo '<a href="' . base_url() . 'post/discover/1" id="1" class="pagination w3-center">1</a>';
                echo '<a href="' . base_url() . 'post/discover/2" id="2" class="pagination w3-center">2</a>';
                echo '<a href="' . base_url() . 'post/discover/3" id="3" class="pagination w3-center">3</a>';
            } else if ($result < 25) {
                echo '<a href="' . base_url() . 'post/discover/1" id="1" class="pagination w3-center">1</a>';
                echo '<a href="' . base_url() . 'post/discover/2" id="2" class="pagination w3-center">2</a>';
                echo '<a href="' . base_url() . 'post/discover/3" id="3" class="pagination w3-center">3</a>';
                echo '<a href="' . base_url() . 'post/discover/4" id="4" class="pagination w3-center">4</a>';
            } else
                if ($page === '1') {

                    for ($i = $page; $i <= $page + 4; $i++) {
                        echo '<a href="' . base_url() . 'post/discover/' . $i . '" id="' . $i . '" class="pagination w3-center">' . $i . '</a>';

                    }
                } else {

                    if ($page === '2') {

                        for ($i = $page - 1; $i <= $page + 3; $i++) {
                            echo '<a href="' . base_url() . 'post/discover/' . $i . '" id="' . $i . '" class="pagination w3-center">' . $i . '</a>';
                        }

                    } else {
                                for ($i = $page - 2; $i <= $page + 2; $i++) {
                                    if($i < ceil($result/6)+1)
                                         echo '<a href="' . base_url() . 'post/discover/' . $i . '" id="' . $i . '" class="pagination w3-center">' . $i . '</a>';

                                }
                    }
                }

            ?>
        </div>

    </div>


</div>

</div>


<script type="text/javascript">
    $('#toggler span,img').click(function () {
        $(this).closest('.journal-entry').find('.journal-text').slideToggle();

    });
    window.onload = activa;

    function activa() {
        var activebutton = document.getElementById("<?php echo $page ?>");
        activebutton.style.backgroundColor = "white";
        activebutton.style.color = "black";
    }
</script>

</body>