<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
  <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/main.css">
<script src="<?php echo base_url() ?>js/jscolor.js"></script>
<style>

</style>
</head>
<body style="font-family:raleway;background-color:#121211">

<div class="background-picture">


  <div id="bara-user" class="w3-row w3-animate-right w3-round w3-card-8" style="background-color:rgb(122,0,1);color:white">
  
        <div class=" w3-row w3-col w3-padding-left w3-padding-top" id="customization2" >
          <div class="w3-row"><a href="profile_page.html"><img class="w3-card-4" src="img/user-photo.jpg" style="width:70px;max-height:70px"></a>
          <p id="account-stats"><a href="profile_page.html">Greetings,<?php echo $this->session->userdata('username'); ?></p></a>
          </div>
        </div>

        <div class="w3-col w3-padding" id="customization">
          <p class="w3-center">Font</p>
          <select id="input-font" class="w3-input"  onchange="changeFont (this);" style="color:black">

            <option value="Raleway" selected ="selected">Raleway</option>
            <option value="Times New Roman" >Times New Roman</option>
            <option value="Arial">Arial</option>
            <option value="Georgia">Georgia</option>
            <option value="Comic Sans MS">Comic Sans MS</option>
            <option value="Tahoma">Tahoma</option>
            <option value="Verdana">Verdana</option>
            <option value="Courier New">Courier New</option>

          </select>
        </div>

        <div class="w3-col w3-padding" id="customization">
          <p class="w3-center">Font-size</p>
          <select id="input-size" class="w3-input"  onchange="changeSize (this);" style="color:black">

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
            <option value="32px" selected ="selected">32px</option>
            <option value="34px">34px</option>
            <option value="36px">36px</option>
            <option value="38px">38px</option>
            <option value="40px">40px</option>
          </select>
        </div>

        <div class="w3-col w3-padding" id="customization">
            <p class="w3-center">Font-color</p>
            <input class="w3-input jscolor {onFineChange:'setTextColor(this)'}" value="000000">
        </div>

        <div class="w3-col w3-padding" id="customization">
          <p class="w3-center">Background</p>
              <input class="w3-input jscolor {onFineChange:'update(this)'}" value="DACA97">
        </div>



  </div>

  <div id="bara-user-mobile" class="w3-row w3-round" style="background-color:rgb(122,0,1);color:white">
    
    <div class="w3-margin-top w3-padding-left" style="width:25%;">
      <a href="profile_page.html"><img class="w3-card-4" src="img/user-photo.jpg" style="width:70px;max-height:70px"></a>
    </div>

      <div style="width:15%;position:absolute;right:15px;top:0;">
        <button onclick="dropdown()" class="w3-btn w3-margin dropdown-button" style="background-color:rgb(122,0,1);font-size:40px">&#8801;</button>
          <div id="content" class="dropdown-content" style="color:black">


                        <p class="w3-center">Font</p>
          <select id="input-font" class="w3-input"  onchange="changeFont (this);" style="color:black">

            <option value="Raleway" selected ="selected">Raleway</option>
            <option value="Times New Roman" >Times New Roman</option>
            <option value="Arial">Arial</option>
            <option value="Georgia">Georgia</option>
            <option value="Comic Sans MS">Comic Sans MS</option>
            <option value="Tahoma">Tahoma</option>
            <option value="Verdana">Verdana</option>
            <option value="Courier New">Courier New</option>

          </select>

                        <p class="w3-center">Font-size</p>
          <select id="input-size" class="w3-input"  onchange="changeSize (this);" style="color:black">

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
            <option value="32px" selected ="selected">32px</option>
            <option value="34px">34px</option>
            <option value="36px">36px</option>
            <option value="38px">38px</option>
            <option value="40px">40px</option>
          </select>

          <p class="w3-center">Font-color</p>
            <input class="w3-input jscolor {onFineChange:'setTextColor(this)'}" value="000000">

          <p class="w3-center">Background</p>
              <input class="w3-input jscolor {onFineChange:'update(this)'}" value="DACA97">
                  
          </div>
      </div>

    </div>


  <div id="bara-copie"></div>

  <div class="w3-animate-zoom" id="notebook_page">
    <p class="w3-margin-left" style="font-size:28px">Writing a chapter of your life</p>
    <div style="width:100%;height:2px;background-color:black;clear:both"></div>
  <?php echo form_open('scripts'); ?>  <textarea id="text-jurnal" name="text-jurnal" autofocus></textarea>  </div>
    <button class="w3-btn w3-padding w3-hover-white w3-margin-right" type="button" data-toggle="modal" data-target="#myModal" style="float:right">Submit</button>
    </form>
  </div>

</div>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:25vh">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Naming your entry</h4>
        </div>
        <div class="modal-body w3-center" style="padding:0;margin:0" >             
                <div id="Demo2" class="w3-container w3-animate-zoom" style="margin:auto">
                    <form action="form.asp">
                        <br>
                          <h4>How would you like to name this entry?</h4>
                          <input class="w3-input w3-border" type="text">
                          <br>
                              <button class="w3-btn w3-padding w3-hover-white" type="button" data-toggle="modal" data-target="#myModal" style="width:100%">Submit</button><br><br>
                       </form>
                </div>

              </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>



<script type="text/javascript">

$(document).ready(function(){
    // to fade in on page load
    $(".background-picture").css("display", "none");
    $(".background-picture").fadeIn(500); 
    // to fade out before redirect
    $('a').click(function(e){
        redirect = $(this).attr('href');
        e.preventDefault();
        $('.background-picture').fadeOut(400, function(){
            document.location.href = redirect
        });
    });
})

  function setTextColor(picker) {
    document.getElementsByTagName('textarea')[0].style.color = '#' + picker.toString();
  }

  function update(jscolor) {
    // 'jscolor' instance can be used as a string
    document.getElementById('notebook_page').style.backgroundColor = '#' + jscolor
}



var changeFont = function(font){
  console.log(font.value)
    document.getElementById("text-jurnal").style.fontFamily = font.value;
}

function changeSize(selectTag) {
    var listValue = selectTag.options[selectTag.selectedIndex].text;
    document.getElementById("text-jurnal").style.fontSize = listValue;
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropdown() {
    document.getElementById("content").classList.toggle("show");
}


</script>

</body>