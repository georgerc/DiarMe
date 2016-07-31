<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/w3.css" />
      <link rel="stylesheet" type="text/css" href="css/index.css" />

<style>
body {
  background-image: url(img/nightstars.jpg);
  background-size: cover;
}
</style>
</head>
<body class="w3-dark-grey">



<div class="w3-container w3-center login-box" style="margin:auto">

    <p id="intro-text">"Make your memories immortal"<br>
          Write your stories and never forget them</p><br>

    <div class="w3-container"  style="margin:auto">
<?php echo form_open('user/login'); ?>

    <form class="w3-container" id="formular_logare">

    <div class="w3-third  w3-card-8"   style="width:100%;background-color: rgba(0,0,0,0.6);">

      <br>

      <div class="formular-children w3-margin ">      
        <input class="w3-input" type="text" placeholder="Username" required style="margin:auto;">
                
      <br>

      </div>
</form>
      <div class="formular-children w3-margin" >      
        <input class="w3-input" type="password" placeholder="Password" required style="margin:auto;width:92%">
      </div> 

      <br>

      <div class="w3-row w3-center" style="width:100%;margin:auto"  >
          <button id="buton_logare" class="w3-btn w3-padding w3-hover-white" type="button" form="formular_logare" value="Login" style="margin:auto;">Login</button>
      </div>

      </form>

      <br> <br>

      <div class="w3-row">

        <div class="w3-row aditional">

        <div class="w3-third  w3-center w3-margin-bottom " >
          <button type="button" data-toggle="modal" data-target="#myModal2" class="w3-btn  w3-padding w3-hover-white">Forgot your password?</button>
        </div>

        <div class="w3-third  w3-center  w3-margin-bottom">
        <a href="home.html" >
          <button type="button" class="w3-btn w3-hover-white  w3-padding" >Enter as a guest</button></a>
        </div>

        <div class="w3-third  w3-center  w3-margin-bottom">
        <button type="button" data-toggle="modal" data-target="#myModal" class="w3-btn  w3-hover-white w3-padding ">
            <div>Create a new account</div>
        </button>
        </div>

      </div>

      </div>

    </div>



        
    </div>


</div>






<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <?php echo form_open('register/register_user'); ?> 
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Creating a new account</h4>
        </div>
        <div class="modal-body " style="padding:0;margin:0" >             
                <div id="Demo2" class="caseta-modala w3-container w3-animate-zoom" style="margin:auto">
                    <form action="form.asp" class="w3-container">
                        <br>
                          <p>
                          <label>Username</label>    
                          <input class="w3-input w3-border" type="text" name="user" required></p>  
                          
                          <p>   
                          <label>Password</label>   
                          <input class="w3-input w3-border" type="password" name="pass" required>
                          </p>

                          <p>
                          <label>Repeat password</label>      
                          <input class="w3-input w3-border" type="password" name="repass" required>
                          </p>

                          <p>  
                          <label>Email</label>    
                          <input class="w3-input w3-border" type="email" name="email" required>
                          </p>
                          <br>
                          <p>      
                          <button class="w3-btn-block w3-black w3-hover-red">Register</button></p>
<?php  echo validation_errors(); ?>
                <?php echo form_close(); ?>
                       </form>
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




<script>
$(document).ready(function(){
    // to fade out before redirect
    $('a').click(function(e){
        redirect = $(this).attr('href');
        e.preventDefault();
        $('body').fadeOut(400, function(){
            document.location.href = redirect
        });
    });
})

</script>


            
</html> 
