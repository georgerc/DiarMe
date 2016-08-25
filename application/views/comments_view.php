<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Comments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='<?php echo base_url() ?>css/comments.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>

    <style>

    </style>
</head>

<body>


<!-- USER BAR -->
<div class="w3-animate-right w3-card-8 w3-row w3-center userbar"
     style="background-color:rgba(143,143,143, 0.7);color:white;height:110px;">
    <br>
    <p style="font-size:20px;">Viewing as: <span
            style="color:#00ADB5"><?php echo $this->session->userdata('username'); ?></span></p>


    <button onclick="location.href = '<?php echo base_url() ?>user/discover/'" class="w3-btn w3-hover-white"
            style="width:35%">Back
    </button>
    <button onclick="location.href = '<?php echo base_url() ?>home/logout';" class="w3-btn w3-hover-white"
            style="width:35%">Sign Out
    </button>
</div>
<!-- END USER BAR -->


<!-- BODY JURNAL -->
<div class="journal-entry">

    <div id="toggler">
        <img class="w3-card-4 " src="<?php echo base_url() ?><?php echo $public_post[0]['img_path'] ?>"
             style="width:80px;height:80px">
        <span class="journal-title"><?php echo $public_post[0]['journal_title']; ?> </span>



    </div>


    <div class="journal-text">
        <span class="text-jurnal"><?php echo $public_post[0]['journal_text'] ?></span>

        <div class="journal-footer" style="background-color: #00ADB5;text-align:right">
            <span class="username">By:<?php echo $public_post[0]['username'] ?></span>
            <span>on <?php echo $public_post[0]['odata'] ?></span>
        </div>

    </div>


</div>
<!-- END BODY JURNAL -->
<!-- COMMENT TEXTAREA -->
<div id="comments" class="comments" style="margin:0 auto;">
    <span style="color:white">Commenting as: <?php echo $this->session->userdata('username') ?></span>
    <form method="POST" action="" id="formular-comment">
        <textarea name='message' class="message" id="comment-write" required></textarea>
        <input id="buton-trimitere" type="submit" class="btn btn-primary" value="Submit comment"/>
    </form>
</div>

<!-- END COMMENT TEXTAREA -->
<!-- COMMENT VIEW -->
<div id="comment-view">

    <?php foreach ($comments_db as $item) { ?>
 <div class="all-comment" id="<?php echo $item['id']; ?>">
        <span class="comment-username"><?php echo $item['username']; ?>:</span>
        <span class="odata"><?php echo $item['odata'] ?></span>
        <div class="comment">
            <span class="mesaj"> <?php echo $item['message']; ?></span>
            <div id="sub">
                <form method="POST" id="vote-info-<?php echo $item['id']; ?>" action="">
                    <input type="hidden" id="id_of_post" name="id_of_post" value="<?php echo $public_post[0]['id']; ?>">
                    <input type="hidden" id="id_of_comment" name="id_of_comment" value="<?php echo $item['id']; ?>">

                    <input type="hidden" id="username" name="username"
                           value="<?php echo $this->session->userdata('username'); ?>">


                    <div class="like-div" id="like-div-<?php echo $item['id']; ?>">
                        <button class="like-btn glyphicon glyphicon-thumbs-up" type="submit"><span>Like</span></button>

                        <span class="counter" id="counter-<?php echo $item['id']; ?>"><?php echo $item['comment_vote'] ?></span>

                    </div>
                </form>
            </div>

            <?php if ($this->session->userdata('username') === $item['username']) { ?>
                <form method="POST" id="delete-info-<?php echo $item['id']; ?>" action="">
                    <input type="hidden" id="id_of_post" name="id_of_post" value="<?php echo $public_post[0]['id']; ?>">
                    <input type="hidden" id="id_of_comment" name="id_of_comment" value="<?php echo $item['id']; ?>">
                    <input type="hidden" id="username" name="username" value="<?php echo $this->session->userdata('username'); ?>">

                        <button data-toggle="tooltip" title="Delete this comment" type="submit" class="btn btn-primary glyphicon glyphicon-remove" style="color:black;float:right;background-color:#FCFCFA;" ></button>
                </form>
            <?php } ?>

        </div>
</div>
    <?php } ?>
</div>
<!-- END COMMENT VIEW -->
<script>


    $(document).ready(function () {

        $('.comments').submit(function () {
            $.ajax({
                url: '<?php echo base_url() ?>user/comments1/' +<?php echo urlencode($public_post[0]['id']); ?>,
                data: $('.message').serialize(),
                type: "POST",
                success: function (result) {
                    $(result).hide().insertBefore('#comment-view').first().slideDown('slow');
                    $('#comment-write').val(' ');


                }

            })
            return false;
        })


    })


    <?php foreach ($comments_db as $item) { ?>
    $("#vote-info-<?php echo $item['id']; ?>").submit(function (e) {

        $.ajax(
            {
                url: '<?php echo base_url()?>user/check_vote',
                type: "POST",
                data: $("#vote-info-<?php echo $item['id']; ?>").serialize(),
                success: function (test) {
                    result = test.result;
                    valoare = test.vote_number;

                    if(result == 1) {
                        $('#like-div-<?php echo $item['id']; ?>').css('color','green');
                        $('#counter-<?php echo $item['id']; ?>').html(valoare - 1);
                       /* $('#like-div-<?php echo $item['id']; ?>').siblings(".counter").html($valoare - 0);*/

                    }
                        else { $('#like-div-<?php echo $item['id']; ?>').css('color','red');
                        $('#counter-<?php echo $item['id']; ?>').html(valoare + 1);
                        }
                    /*$('#like-div-<?php echo $item['id']; ?>').siblings(".counter").html($valoare + 1);*/

                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });

        e.preventDefault();	//STOP default action

    });
    $("#delete-info-<?php echo $item['id']; ?>").submit(function (e) {

        $.ajax(
                {
                    url: '<?php echo base_url()?>user/delete_comment',
                    type: "POST",
                    data: $("#delete-info-<?php echo $item['id'];?>").serialize(),
                    success: function (test) {
                        $('#<?php echo $item['id'];?>').hide();
                    }
                });

        e.preventDefault();	//STOP default action

    });

    <?php } ?>



</script>


</body>
</html>






