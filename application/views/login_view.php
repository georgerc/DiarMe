<!DOCTYPE html>
<html>
<head>
    <title>DiarMe</title>
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
    <link href='<?php echo base_url() ?>css/raleway.css' rel='stylesheet' type='text/css'>
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/index.css"/>
    <style>


    </style>
</head>
<body >
<div class="w3-container w3-center login-box " >

    <p id="intro-text">"Make your memories immortal"<br>
        Write your stories and never forget them</p><br>

    <div class="w3-third  w3-card-8" style="width:80%;background-color: rgba(0,0,0,0.6);position:relative;left:10%">
        <br>
        <div class="formular-children  w3-margin ">

            <?php echo form_open('user/login'); ?>
            <input class="w3-input" type="text" id="username" name="username" placeholder="Username" required
                   style="margin:auto;width:80%">
            <br>

        </div>

        <div class="formular-children w3-margin">

            <input class="w3-input" type="password" id="password" name="password" placeholder="Password" required
                   style="margin:auto;width:80%">

        </div>

        <br>

        <div class="w3-row w3-center" style="width:77%;margin: 0 auto;">

            <input id="buton_logare" class="w3-btn w3-padding w3-hover-white" name="submit" type="submit"
                   value=" Login ">

            <?php echo validation_errors() ?>
        </div>

        </form>

        <br> <br>

        <div class="w3-row" style="width:70%;margin:0 auto">

            <div class="w3-row ">

                <div class=" w3-center w3-margin-bottom test123">
                    <button type="button" data-toggle="modal" data-target="#myModal2"
                            class="w3-btn  w3-padding w3-hover-white" style="float:left;">Forgot your password?
                    </button>
                </div>

                <div class=" w3-center  w3-margin-bottom test123 test1234">
                    <button type="button" data-toggle="modal" data-target="#myModal"
                            class="w3-btn  w3-hover-white w3-padding " >
                       Create a new account
                    </button>
                </div>

            </div>

        </div>

    </div>


</div>

</div>


</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Creating a new account</h4>
            </div>
            <div class="modal-body " style="padding:0;margin:0">
                <div id="Demo2" class="caseta-modala w3-container w3-animate-zoom" style="margin:auto">
                    <?php echo form_open('register/register_user'); ?>
                    <label>Username</label>
                    <p></p>

                    <input id="username" name="username" value="<?php echo set_value('username'); ?>" type="text"
                           required class="w3-input w3-border">
                    <p></p>
                    <label>Email</label>
                    <p></p>

                    <input id="email" name="email" value="<?php echo set_value('email'); ?>" type="email" required
                           class="w3-input w3-border">
                    <p></p>

                    <label>Password</label>
                    <p></p>
                    <input id="password" name="password" value="<?php echo set_value('password'); ?>" type="password"
                           required class="w3-input w3-border">
                    <p></p>
                    <label>Confirm password</label>
                    <p></p>
                    <input id="password_conf" name="password_conf" type="password" required class="w3-input w3-border">
                    <p></p>
                    <input class="w3-btn-block w3-black w3-hover-red" name="submit" id="submit" type="submit"
                           value=" Register">
                    <?php echo validation_errors() ?>
                    <?php echo form_close(); ?>


                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reseting your password</h4>
            </div>
            <div class="modal-body " style="padding:0;margin:0">
                <div id="Demo2" class="caseta-modala w3-container w3-animate-zoom" style="margin:auto">
                        <br>

                        <p>
                            <?php echo form_open('forgot_password_C/reset_password') ?>
                            <label>Email</label>
                            <input class="w3-input w3-border" type="email" name="email" required>
                        </p>
                        <br>
                        <p>
                            <input type="submit" name="submit" class="w3-btn-block w3-black w3-hover-red" onclick="changeModal()">Change password</button>
                        </p>
                        <?php echo form_close() ?>
                    <p class="w3-animate-zoom" id="mesaj" style="display:none;font-size:20px;">An email has been sent to the specified address.</p>
                </div>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<style>
    .error {
        color: red;

    }

</style>

<script>
function changeModal() {
      document.getElementById("test12").style.display="none";
      document.getElementById("mesaj").style.display="block";

}

</script>

        
</body>
</html>
