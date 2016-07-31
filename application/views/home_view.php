<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/logo.ico" type="image/x-icon"/>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/home_view.css"/>
    <script src="<?php echo base_url() ?>js/jscolor.js"></script>
    <style>
        .custom-input::-webkit-file-upload-button {
            visibility: hidden;
            width: 0px;
        }

        .custom-input::before {
            display: none;
            content: 'a';
        }

        @media only screen and (min-width: 1040px) {

        }

        .modifiers span, select, input {
            margin-top: 7px;
            margin-left: auto;
            margin-right: auto;
            float: left;
            height: 37.2px;
            color: black;
        }

        .modifiers span {
            line-height: 37px;
            border-right: 1px solid #121211;
            font-size: 24px;
            width: 20%;
            border-bottom: 1px solid #808080;
            background-color: white;

        }

        .modifiers {
            height: 100%;
            padding: 0;
            max-width: 1000px;

        }

        .modifiers div {
            height: 100%;
            margin: 0;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        #divider {
            width: 100%;
            height: 1px;
            background-color: black;


        }


        @media only screen and (min-width: 1520px) {
            #user-info {
                display: block;
            }


        }

    </style>
</head>
<body style="font-family:raleway;background-color:#393E46">


<!-- BARA LARGE -->
<div id="bara-user-large" class="w3-row w3-animate-right w3-round w3-card-8" style="background-color:#222831
;color:white;height:50px">

    <button class="w3-btn" id="buton"
            style="background:url('<?php echo base_url(); ?>img/logo4.png')
;float:left;margin-left:50px;height:50px;width:170px;">

    </button>

    <div class="modifiers w3-container" style="max-width:1000px;margin:0 auto;padding:0;height:100%">

        <div class="w3-third" style="height:100%;">
            <div class="w3-container  w3-center " style="max-width:70%;margin:0 auto;padding:0">
                <span class="w3-card-8" style="">Aa</span>

                <select class="w3-card-8" id="input-size" class="w3-input " onchange="changeSize (this);"
                        style="width:80%">
                    <option value="" disabled selected>Size</option>
                    <option value="12px">12px</option>
                    <option value="14px">14px</option>
                    <option value="16px">16px</option>
                    <option value="18px">18px</option>
                    <option value="20px">20px</option>
                    <option value="22px">22px</option>
                    <option value="24px">24px</option>
                    <option value="26px">26px</option>
                    <option value="28px">28px</option>
                    <option value="30px">30px</option>
                    <option value="32px">32px</option>
                    <option value="34px">34px</option>
                    <option value="36px">36px</option>
                    <option value="38px">38px</option>
                    <option value="40px">40px</option>
                </select>

            </div>
        </div>


        <div class="w3-third" style="height:100%;">
            <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                <span id="preview" class="w3-card-8">Aa</span>

                <select id="input-font" class="w3-input w3-card-8" onchange="changeFont (this);"
                        style="color:black;width:80%;float:left;height:37.2px;">

                    <option value="" disabled selected>Font</option>
                    <option value="Raleway">Raleway</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Arial">Arial</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Comic Sans MS">Comic Sans MS</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="Courier New">Courier New</option>

                </select>
            </div>
        </div>

        <div class="w3-third" style="height:100%">
            <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                <span id="span" class="w3-card-8">Aa</span>

                <input value="Font Color" disabled
                       class=" w3-card-8  jscolor {valueElement:null,value:'66ccff',onFineChange:'setTextColor(this)',styleElement:'styleSpan'}"
                       style="cursor:pointer;border:none;border-bottom:1px solid #808080;color:black;width:80%;float:left;height:37px;text-align:center">
            </div>
        </div>
    </div>


    <div class="w3-row w3-card-8 w3-container" id="togglebar"
         style="cursor:pointer;position:absolute;right:70px;top:0;width:210px;height:100%;line-height:15px;background-color:#333F44">
            <span id="user-info"><span
                    style="color:lightblue;font-size:16px;line-height:50px;float:right;margin-right:50px"><?php echo $this->session->userdata('username'); ?></span>

            </span>

        <img class="w3-card-4 w3-circle"
             src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('username') ?>.jpg"
             style="width:50px;height:50px;position:absolute;top:0;right:10px">

        <div class="w3-center" id="settingss"
             style="background-color:#EEEEEE;position:absolute;right:0;top:50px;display:none;width:210px;height:115px">

            <button type="button" class="w3-btn w3-hover-white" data-toggle="modal" data-target="#password-change"
                    style="display:block;border-radius:0;height:40px;width:70%;font-size:20px;margin:10px auto">
                Settings
            </button>
            <button onclick="location.href = '<?php echo site_url("home/logout"); ?>';" class="w3-btn w3-hover-white"
                    style="margin-top:5px;border-radius:0;font-size:20px;height:40px;width:70%;margin-left:auto">Sign
                Out
            </button>

        </div>
    </div>


</div>
<!-- END BARA LARGE -->

<!-- BARA MEDIE -->
<div id="bara-user-medium" class="w3-row w3-animate-right w3-round w3-card-8"
     style=background-color:#222831;color:white;height:50px">



    <button class="w3-btn" id="buton2"
            style="background:url('<?php echo base_url(); ?>img/logo5.png')
                ;float:left;margin-left:3px;height:50px;width:9%;">

    </button>

    <div class="modifiers w3-container w3-row" style="width:69.999%;margin-left:10%;padding:0;height:100%">

        <div style="height:100%;width:32%;float:left">
            <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                <span class="w3-card-8" style="">Aa</span>

                <select class="w3-card-8" id="input-size" class="w3-input " onchange="changeSize (this);"
                        style="width:80%">
                    <option value="" disabled selected>Size</option>
                    <option value="12px">12px</option>
                    <option value="14px">14px</option>
                    <option value="16px">16px</option>
                    <option value="18px">18px</option>
                    <option value="20px">20px</option>
                    <option value="22px">22px</option>
                    <option value="24px">24px</option>
                    <option value="26px">26px</option>
                    <option value="28px">28px</option>
                    <option value="30px">30px</option>
                    <option value="32px">32px</option>
                    <option value="34px">34px</option>
                    <option value="36px">36px</option>
                    <option value="38px">38px</option>
                    <option value="40px">40px</option>
                </select>

            </div>
        </div>


        <div style="height:100%;width:32%;float:left">
            <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                <span id="preview" class="w3-card-8">Aa</span>

                <select id="input-font" class="w3-input w3-card-8" onchange="changeFont (this);"
                        style="color:black;width:80%;float:left;height:37.2px;">

                    <option value="" disabled selected>Font</option>
                    <option value="Raleway">Raleway</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Arial">Arial</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Comic Sans MS">Comic Sans MS</option>
                    <option value="Tahoma">Tahoma</option>
                    <option value="Verdana">Verdana</option>
                    <option value="Courier New">Courier New</option>

                </select>
            </div>
        </div>

        <div style="height:100%;width:32%;float:left">
            <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                <span id="span" class="w3-card-8">Aa</span>

                <input value="Font Color" disabled
                       class=" w3-card-8  jscolor {valueElement:null,value:'66ccff',onFineChange:'setTextColor(this)',styleElement:'styleSpan'}"
                       style="cursor:pointer;border:none;border-bottom:1px solid #808080;color:black;width:80%;float:left;height:37.2px;text-align:center">
            </div>
        </div>
    </div>

    <div class="w3-row w3-container" id="togglebar2"
         style="width:22%;position:absolute;right:0;top:0;height:100%;line-height:15px;cursor:pointer;background-color:#333F44">
              <span id="user-info"><span
                      style="color:lightblue;font-size:16px;line-height:50px;float:right;margin-right:50px"><?php echo $this->session->userdata('username'); ?></span>

            </span>

        <img class="w3-card-4 w3-circle"
             src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('username') ?>.jpg"
             style="width:50px;height:50px;position:absolute;top:0;right:10px">


    </div>

    <div class="w3-center" id="settingss2"
         style="display:none;position:absolute;right:0;top:50px;width:22%;background-color:#EEEEEE;">
        <button onclick="location.href = '<?php echo site_url("home/logout"); ?>';" class="w3-btn w3-hover-white"
                style="margin-top:5px;border-radius:0;font-size:20px;height:40px;width:70%;margin-left:auto">Sign Out
        </button>

        <button type="button" class="w3-btn w3-hover-white" data-toggle="modal" data-target="#password-change"
                style="margin-top:20px;display:block;border-radius:0;height:40px;width:70%;font-size:20px;margin:20px auto">
            Settings
        </button>
    </div>

</div>
<!-- END BARA MEDIE -->


<!-- BARA MOBIL -->
<div id="bara-user-mobile" class="w3-row w3-round"
     style="background-color:#222831;color:white;height:50px">

    <div class="w3-row w3-container"
         style="position:absolute;left:0;top:0;width:75%;height:50px;line-height:15px;">


        <button class="w3-btn" id="buton3"
                style="background:transparent;outline:none;border:none
                    ;float:left;height:50px;width:60px;">
            <img src="<?php echo base_url(); ?>img/logo.png" style="width:50px;height:50px;position:absolute;top:0;left:10px">
        </button>

        <div id="togglebar3" style="cursor:pointer;">
            <img class="w3-circle w3-card-4"
                 src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('username') ?>.jpg"
                 style="position:absolute;left:70px;width:50px;height:50px;">

            <span id="user-info" style="font-size:20px;position:absolute;left:125px;top:17px"><span
                    style="color:lightblue"><?php echo $this->session->userdata('username'); ?></span>



                            </span>
        </div>

        <div class="w3-center" id="settingss3"
             style="display:none;position:absolute;top:50px;left:105px;width:200px;background-color:#EEEEEE;">
            <button onclick="location.href = '<?php echo site_url("home/logout"); ?>';" class="w3-btn w3-hover-white"
                    style="margin-top:5px;border-radius:0;font-size:20px;height:40px;width:70%;o">Sign Out
            </button>

            <button type="button" class="w3-btn w3-hover-white" data-toggle="modal" data-target="#password-change"
                    style="margin-top:20px;display:block;border-radius:0;height:40px;width:70%;font-size:20px;margin:20px auto">
                Settings
            </button>
        </div>
    </div>

    <div class="dropdown" style="width:15%;position:absolute;right:15px;top:-30px;">
        <button class="w3-btn w3-margin" id="dLabel" data-target="#" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style="background-color:rgba(122,0,1,0);font-size:40px">
            &#8801;
        </button>

        <div id="meniu-dropdown" class="dropdown-menu" aria-labelledby="dLabel"
             style="position:absolute;top:100px;left:-85px;color:black;width:150px">

            <p class="w3-center" style="font-size:20px">Font</p>
            <select id="input-font" class="w3-input w3-border" onchange="changeFont (this);"
                    style="color:black;margin-top:10px">

                <option value="Raleway" selected="selected">Raleway</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Arial">Arial</option>
                <option value="Georgia">Georgia</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Verdana">Verdana</option>
                <option value="Courier New">Courier New</option>

            </select>
            <br><br><br>
            <p class="w3-center" style="font-size:20px">Font-size</p>
            <select id="input-size" class="w3-input w3-border" onchange="changeSize (this);"
                    style="color:black;margin-top:10px">

                <option value="12px">12px</option>
                <option value="14px">14px</option>
                <option value="16px">16px</option>
                <option value="18px">18px</option>
                <option value="20px">20px</option>
                <option value="22px">22px</option>
                <option value="24px">24px</option>
                <option value="26px">26px</option>
                <option value="28px">28px</option>
                <option value="30px">30px</option>
                <option value="32px" selected="selected">32px</option>
                <option value="34px">34px</option>
                <option value="36px">36px</option>
                <option value="38px">38px</option>
                <option value="40px">40px</option>
            </select>
            <br><br><br>
            <p class="w3-center" style="font-size:20px">Font-color</p>
            <input class="w3-input jscolor {onFineChange:'setTextColor(this)'}" value="000000" style="margin-top:10px">
            <br>
        </div>

    </div>
</div>
<!-- END BARA MOBIL -->
<div id="bara-copie"></div>

<!-- BARA LATERALA -->
<div class="animate-left side-bar" id="side-bar" style="float:left;overflow-y:auto;z-index:20">

    <button href="#" id="buton-close"
            style="background-color: Transparent;outline:none;border:none;font-size:45px;float:right;">&times;</button>

    <h2 class="w3-center">Discover & Journals</h2>

    <div style="width:100%;height:2px;background-color:black;margin:15px auto"></div>

    <button onclick="location.href = '<?php echo site_url("post/discover/1"); ?>';"
    " class="w3-btn"
    style="color:#94F3E4;background-color:#43474D;font-size:1.2em;border-radius:0;width:100%;height:50px;margin:15px auto;padding:10px">Discover other
    journals
    </button>

    <div style="width:100%;height:2px;background-color:black;margin:15px auto"></div><br>
    <h1 style="text-align:center;font-style: italic">My journals</h1> <div style="width:100%;height:2px;background-color:black;margin:15px auto"></div>
    <?php
    foreach ($posts as $post) {
    ?>
    <button type="button" data-toggle="modal" data-target="#journal-entry-<?php echo $post->id ?>"
            style="border:none;background-color:#EEEEEE;color:black;width:100%;height:50px;font-size:16px">
        <?php echo $post->journal_title." <br> ".$post->odata . "</button><div id='divider'></div>";


        }
        ?>


</div>
<!-- END BARA LATERALA -->

<!-- MODAL JURNALE -->
<?php
foreach ($posts as $post) {
    ?>
    <div class="modal fade " id="journal-entry-<?php echo $post->id ?>" role="dialog"
         style=width:100%;margin:0;padding:0;">
        <div class="modal-dialog" id="importantstuff" >


            <div class="modal-content" style="width:100%;background-color:#DACA97;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo $post->journal_title ?> | <?php echo $post->odata ?></h4>
                </div>
                <div class="modal-body w3-center" style="padding:0;margin:0">
                    <div id="<?php echo $post->id ?>" class="w3-container w3-animate-zoom"
                         style="margin:auto;min-height:100px;padding-top:15px;font-size:20px">
                        <?php echo $post->journal_text; ?>
                    </div>

                </div>


                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>post/delete/<?php echo $post->id ?>">
                        <button type="button" class="w3-center w3-white"
                                          style="float:left;width:60px;height:35px;border:none;outline:none">Delete
                        </button>

                        </a>
                        <a href="<?php echo base_url(); ?>post/edit/<?php echo $post->id ?>">
                            <button type="button" class="w3-center w3-white"
                                    style="float:left;width:60px;height:35px;border:none;outline:none;margin-left:10px;">Edit
                            </button>
                    </a>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><br><br>
                    <div class="w3-row w3-center">
                        <select id="input-font" class="w3-input w3-border" onchange="changeFontModal<?php echo $post->id ?> (this);"
                                style="color:black;margin:0 auto;width:33.333%">

                            <option value="Raleway" selected="selected">Raleway</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="Arial">Arial</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Comic Sans MS">Comic Sans MS</option>
                            <option value="Tahoma">Tahoma</option>
                            <option value="Verdana">Verdana</option>
                            <option value="Courier New">Courier New</option>

                        </select>

                        <select id="input-size" class="w3-input w3-border" onchange="changeSizeModal<?php echo $post->id ?> (this);"
                                style="color:black;margin:0 auto;width:33.333%">

                            <option value="12px">12px</option>
                            <option value="14px">14px</option>
                            <option value="16px">16px</option>
                            <option value="18px">18px</option>
                            <option value="20px">20px</option>
                            <option value="22px">22px</option>
                            <option value="24px">24px</option>
                            <option value="26px">26px</option>
                            <option value="28px">28px</option>
                            <option value="30px">30px</option>
                            <option value="32px" selected="selected">32px</option>
                            <option value="34px">34px</option>
                            <option value="36px">36px</option>
                            <option value="38px">38px</option>
                            <option value="40px">40px</option>
                        </select>

                        <input class="w3-input jscolor {onFineChange:'setTextColorModal<?php echo $post->id ?>(this)'}" value="000000" style="margin:0 auto;width:33.333%">
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php }
?>
<!-- END MODAL JURNALE -->

<!-- TEXT AREA -->
<?php echo form_open('scripts/insert_text'); ?>
<div class="w3-animate-zoom" id="notebook_page">
    <p class="w3-padding-top w3-center" style="font-size:28px">Writing a chapter of your life</p>
    <div style="width:80%;height:2px;background-color:black;clear:both;margin:0 auto"></div>

    <?php echo form_textarea('journal-text', set_value(''), 'class="journal-text"'); ?>

    <div class="w3-right w3-padding-right">
        <button id="buton_trimitere" class="w3-btn" type="button"name="trimitere" value="Submit" data-toggle="modal"
                data-target="#myModal" style="margin-bottom:10px;color:white;background-color:#43474D;">Submit
        </button>
    </div>

</div>
<!-- END TEXT AREA -->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="margin-top:25vh">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Naming your entry</h4>
            </div>
            <div class="modal-body w3-center" style="padding:0;margin:0">
                <div id="Demo2" class="w3-container w3-animate-zoom" style="margin:auto">
                    <form action="form.asp">
                        <br>
                        <h4>How would you like to name this chapter?</h4>
                        <input required class="w3-input w3-border" name="journal-title" type="text" maxlength="30">




                        <div style="margin-top:50px;padding-top:50px;padding-bottom:30px">

                            <input type="checkbox" name="share" id="share" class="w3-check" style="margin-top:-2px">
                            <label class="w3-validate" style="font-size:20px;">Would you like to share this entry with
                                other users?</label>

                        </div>

                        <input class="w3-btn w3-padding w3-hover-white" type="submit" value="Post your entry" data-toggle="modal"
                               data-target="#myModal" style="width:100%;margin-top:16px">
                    </form>
                </div>

            </div>
            <?php echo form_close(); ?>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="password-change" role="dialog">
    <div class="modal-dialog">


        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Changing your password or your profile picture</h4>
            </div>

            <div class="modal-body">
                <h2>Changing your password</h2>

                <?php echo form_open('scripts/change_password') ?>

                <input placeholder="Old Password" id="old_pass" name="old_pass" class="w3-input w3-border"
                       type="password" style="margin-bottom:25px">

                <input placeholder="New Password" id="new_pw" name="new_pw" class="w3-input w3-border"
                       type="password" style="margin-bottom:25px">

                <input placeholder="Confirm Password" id="conf_pw" name="conf_pw" class="w3-input w3-border"
                       type="password" style="margin-bottom:25px">

                <input class="w3-margin-top w3-btn w3-hover-white" id="submit" name="submit" type="submit"
                       style="width:100%"></button>
                <?php echo $this->session->flashdata('result'); ?>
                <?php echo form_close(); ?>


                <div id="divider" style="margin-top:290px"></div>

                <h2>Changing your profile picture</h2>
                <div class="w3-row w3-margin-top">
                    <div class="w3-half w3-center">
                        <h4>Current picture</h4>
                        <img class="w3-card-4"
                             src="<?php echo base_url(); ?>uploads/<?php echo $this->session->userdata('username') ?>.jpg"
                             style="margin-top:20px;width:130px;height:130px;">


                    </div>
                    <div class="w3-half">

                        <div style="height:0px;overflow:hidden">
                            <input type="file" id="fileInput" name="userfile" size="50"/>
                        </div>

                        <br><br><br>
                        <?php echo form_open_multipart('upload_controller/do_upload'); ?>
                        <?php echo "<input class='w3-btn w3-hover-white custom-input' type='file' name='userfile' style='width: 80%' size='50' />"; ?>
                        <br>
                        <br>
                        <br>
                        <?php echo "<input class='w3-btn w3-hover-white' type='submit' name='submit' value='Upload' /> "; ?>
                        <br>


                        <?php echo $this->session->flashdata('upld_img'); ?>
                        <?php echo "</form>" ?>

                    </div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript">
    $("#togglebar").click(function () {
        $("#settingss").fadeToggle();
    });
    $("#togglebar2").click(function () {
        $("#settingss2").fadeToggle();
    });
    $("#togglebar3").click(function () {
        $("#settingss3").fadeToggle();
    });
    $("#dLabel").click(function () {
        $("#meniu-dropdown").fadeToggle();
    })
    function chooseFile() {
        $("#fileInput").click();
    }

    function changeSize(selectTag) {
        var listValue = selectTag.options[selectTag.selectedIndex].text;
        document.getElementById("text-jurnal").style.fontSize = listValue;
    }

    var changeFont = function (font) {
        console.log(font.value)
        document.getElementById("text-jurnal").style.fontFamily = font.value;
        document.getElementById("preview").style.fontFamily = font.value;
    }

    function setTextColor(picker) {
        document.getElementsByTagName('textarea')[0].style.color = '#' + picker.toString();
        document.getElementById('span').style.color = '#' + picker.toString();
    }

    function update(jscolor) {
        document.getElementById('notebook_page').style.backgroundColor = '#' + jscolor
    }

    $(document).on('click', '.dropdown .dropdown-menu', function (e) {
        e.stopPropagation();
    });


    <?php foreach($posts as $post) {?>
    var changeFontModal<?php echo $post->id ?> = function (font) {
        console.log(font.value)
        document.getElementById("<?php echo $post->id ?>").style.fontFamily = font.value;
    }
    function changeSizeModal<?php echo $post->id ?>(selectTag) {
        var listValue = selectTag.options[selectTag.selectedIndex].text;
        document.getElementById("<?php echo $post->id ?>").style.fontSize = listValue;
    }
    function setTextColorModal<?php echo $post->id ?>(picker) {
        document.getElementById('<?php echo $post->id ?>').style.color = '#' + picker.toString();
    }
<?php } ?>


    $("#buton").click(function () {
        $("#side-bar").slideToggle();
    });

    $("#buton2").click(function () {
        $("#side-bar").slideToggle();
    });

    $("#buton3").click(function () {
        $("#side-bar").slideToggle();
    });

    $("#buton-close").click(function () {
        $("#side-bar").toggle();
    });


    $(function () {

        var $header = $('#bara-user-large');
        var $content = $('#side-bar');
        var $pagina = $('#notebook_page');

        var $window = $(window).on('resize', function(){
            var height = $(this).height() - $header.height();
            $content.height(height);
            $pagina.height(height - 50);
        }).trigger('resize');

    });
</script>

</body>