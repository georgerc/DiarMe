<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/index.css" />

</head>
<body class="w3-dark-grey">


<div class="w3-container w3-center login-box" style="margin:auto">

    <p id="intro-text">"Make your memories immortal"<br>
          Write your stories and never forget them</p><br>

     <div class="w3-third  w3-card-8"   style="width:100%;background-color: rgba(0,0,0,0.6);">
      <div class="formular-children w3-margin ">
     
       <?php echo form_open('verifylogin'); ?>      
        <input class="w3-input" type="text" id="username" name="username" placeholder="Username" required style="margin:auto;">
      <br>

      </div>

      <div class="formular-children w3-margin" >      
        
        <input class="w3-input" type="password" id="password" name="password" placeholder="Password" required style="margin:auto;width:92%">
        
      </div> 

      <br>

      <div class="w3-row w3-center" style="width:100%"  >

        <input id="buton_logare"class="w3-btn w3-padding w3-hover-white" name="submit" type="submit" value=" Login ">
              <?=form_error("password") ?>            
      </div>

      </form>

      <br> <br>

      <div class="w3-row">

        <div class="w3-row aditional">

        <div class="w3-third  w3-center w3-margin-bottom ">
          <button type="button" data-toggle="modal" data-target="#myModal2" class="w3-btn  w3-padding w3-hover-white"style="height:35px;">Forgot your password?</button>
        </div>
        <div class="w3-third"><p> </p></div>

        <div class="w3-third  w3-center  w3-margin-bottom">
        <button type="button" data-toggle="modal" data-target="#myModal" class="w3-btn  w3-hover-white w3-padding "style="height:35px;">
            <div>Create a new account</div>
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
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Creating a new account</h4>
        </div>
        <div class="modal-body " style="padding:0;margin:0" >             
                <div id="Demo2" class="caseta-modala w3-container w3-animate-zoom" style="margin:auto">
       <?php echo form_open('register/register_user'); ?> 
            <label>Username</label><p></p>

            <input id="username" name="username" value="<?php echo set_value('username'); ?>" type="text" required class="w3-input w3-border"><p></p>    
            <label>Email</label><p></p>

            <input id="email" name="email" value="<?php echo set_value('email'); ?>" type="email" required class="w3-input w3-border"><p></p>
            
            <label>Password</label><p></p>
            <input id="password" name="password" value="<?php echo set_value('password'); ?>" type="password" required class="w3-input w3-border"> 
             <p></p>
            <label>Confirm password</label>
             <p></p>
            <input id="password_conf" name="password_conf" type="password" required class="w3-input w3-border"> 
            <p></p>
            <input class="w3-btn-block w3-black w3-hover-red" name="submit" id="submit" type="submit" value=" Register">
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
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reseting your password</h4>
        </div>
        <div class="modal-body " style="padding:0;margin:0" >             
                <div id="Demo2" class="caseta-modala w3-container w3-animate-zoom" style="margin:auto">
                    <form action="form.asp" class="w3-container">
                        <br>

                          <p>  
                          <label>Email</label>    
                          <input class="w3-input w3-border" type="email" name="email" required>
                          </p>
                          <br>
                          <p>      
                          <button class="w3-btn-block w3-black w3-hover-red">Change password</button></p>

                       </form>
                </div>

              </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<style >
  
.error{
color:red;

}

</style>
<!--
<script>

var background = ['nightstars.jpg', 'wallpaper2.jpg', 'wallpaper3.jpg', 'wallpaper4.jpg', 'wallpaper5.png', 'wallpaper6.jpg'];
$('html').css({'background-image': 'url(img/' + background[Math.floor(Math.random() * background.length)] + ')'});

$(document).ready(function(){
    
    $('a').click(function(e){
        redirect = $(this).attr('href');
        e.preventDefault();
        $('body').fadeOut(400, function(){
            document.location.href = redirect
        });
    });
})

</script>

            -->
</html> 
