<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css"/>
    <script src="<?php echo base_url() ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/home_view.css"/>
    <script src="<?php echo base_url() ?>js/jscolor.js"></script>
<style>
@media only screen and (min-width:620px) {
#butoanecontmed {
  font-size: 11px
}
}
@media only screen and (min-width:1040px) { 
#butoanecontmed {
  font-size: 16px;
}
}
.modifiers span,select,input {
  margin-top: 35px;
  margin-left: auto;
  margin-right: auto;
  float: left;
  height: 37.2px;
  color:black;
}
.modifiers span {
  line-height:37px;
  border-right:1px solid #121211;
  font-size:24px;
  width:20%;
  border-bottom:1px solid #808080;
  background-color:white;

}
.modifiers {
  height: 100%;
  padding:0;
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
  margin-top: 5px;
  
}
#butoanecont {
  font-size: 13px;
  margin-top: 0;
  padding-top:2px;
  padding-left: 0px;
}
.show {display:block;}
@media only screen and (min-width:1520px) {
#user-info {
  display:block;
}
#butoanecont {
  font-size:14px;  
  padding-left: 10px;
  padding-top: 5px;
}

}
@media only screen and (min-width:1780px) {
#butoanecont {
  font-size: 20px;
  line-height: 10px
}
}
</style>
</head>
<body style="font-family:raleway;background-color:#121211">
<!--background:url(../img/tr.jpg);background-size:cover> -->


  <div id="bara-user-large" class="w3-row w3-animate-right w3-round w3-card-8" style="background-color:rgba(143,143,143, 0.3);color:white;height:110px">

    <button class="w3-btn w3-hover-white" id="buton" style="float:left;margin-left:25px;height:50px;margin-top:30px;width:150px;font-size:32px;line-height:10px">Menu</button>

        <div class="modifiers w3-container" style="max-width:1000px;margin:0 auto;padding:0;height:100%">

                <div class="w3-third" style="height:100%;">
                  <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                      <span class="w3-card-8" style="">Aa</span>

          <select class="w3-card-8" id="input-size" class="w3-input "  onchange="changeSize (this);" style="width:80%">
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
              <span id="preview" class="w3-card-8" >Aa</span>

          <select id="input-font" class="w3-input w3-card-8"  onchange="changeFont (this);"  style="color:black;width:80%;float:left;height:37.2px;">

            <option value="" disabled selected>Font</option>
            <option value="Raleway">Raleway</option>
            <option value="Times New Roman" >Times New Roman</option>
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
    style="border:none;border-bottom:1px solid #808080;color:black;width:80%;float:left;height:37.2px;text-align:center" >
  </div>
            </div>
        </div>

        <div class="w3-row w3-container w3-leftbar w3-border-red w3-dark-grey" style="position:absolute;right:0;top:0;width:280px;height:100%;line-height:15px">
            <span id="user-info" style="position:absolute;right:100px;top:20px"><span style="color:lightblue"><?php echo $this->session->userdata('username'); ?></span>
              <div class="w3-margin-top w3-margin-bottom" style="width:100%;height:1px;background-color:white"></div>

            <div class="w3-container w3-center" style="width:160px;padding:0">
      <button  onclick="location.href = 'index.html';" id="butoanecont" class="w3-btn w3-hover-white"style="width:100%;border-radius:0;font-weight:bold;height:28px">Sign Out</button>
    </div>
            </span>
            <img class="w3-card-4" src="img/user-photo.png" style="margin-top:20px;width:68px;max-height:70px;float:right">



        </div>


  </div>





<div id="bara-user-medium" class="w3-row w3-animate-right w3-round w3-card-8" style="background-color:rgba(122,0,1, 0.5);color:white;height:110px">

  <button class="w3-btn w3-hover-white w3-center" id="buton2" style="float:left;margin-left:1%;height:50px;margin-top:30px;width:10%;font-size:1.2em;line-height:10px">Menu</button>
        <div class="modifiers w3-container w3-row" style="width:64.999%;margin-left:10%;padding:0;height:100%">

                <div style="height:100%;width:32%;float:left">
                  <div class="w3-container  w3-center" style="max-width:70%;margin:0 auto;padding:0">
                      <span class="w3-card-8" style="">Aa</span>

          <select class="w3-card-8" id="input-size" class="w3-input "  onchange="changeSize (this);" style="width:80%">
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
              <span id="preview" class="w3-card-8" >Aa</span>

          <select id="input-font" class="w3-input w3-card-8"  onchange="changeFont (this);"  style="color:black;width:80%;float:left;height:37.2px;">

            <option value="" disabled selected>Font</option>
            <option value="Raleway">Raleway</option>
            <option value="Times New Roman" >Times New Roman</option>
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
    style="border:none;border-bottom:1px solid #808080;color:black;width:80%;float:left;height:37.2px;text-align:center" >
  </div>
            </div>
        </div>

 <div class="w3-row w3-container w3-leftbar w3-border-red w3-dark-grey" style="width:29%;position:absolute;right:0;top:0;height:100%;line-height:15px;">
            <span id="user-info" style="position:absolute;right:100px;top:20px"><?php echo $this->session->userdata('username'); ?>
              <div class="w3-margin-top w3-margin-bottom" style="width:100%;height:1px;background-color:white"></div>
   <button  onclick="location.href = 'index.html';" id="butoanecontmed" class="w3-center w3-btn w3-hover-white"style="font-size:1.2em;border-radius:0;width:100%;height:30px;padding:0;">Sign Out</button>

            </span>
            <img class="w3-card-4" src="img/user-photo.png" style="margin-top:20px;width:68px;max-height:70px;float:right">

        </div>



  </div>



  <div id="bara-user-mobile" class="w3-row w3-round" style="background-color:rgba(143,143,143, 0.3);color:white;height:110px">
    
<div class="w3-row w3-container w3-rightbar w3-border-red w3-dark-grey" style="position:absolute;left:0;top:0;width:75%;height:110px;line-height:15px">
           <img class="w3-card-4" src="img/user-photo.png" style="width:68px;max-height:70px;float:left;margin-top:10px">
            <span id="user-info" style="position:absolute;left:100px;top:20px"><span style="color:lightblue"><?php echo $this->session->userdata('username'); ?></span>
              <div class="w3-margin-top w3-margin-bottom" style="width:100%;height:1px;background-color:white"></div>



      <button class="w3-btn w3-hover-white w3-center" id="buton3" style="border-radius:0;width:45%;height:30px;margin-right:5px;padding:5px;font-size:1.2em;line-height:10px">Menu</button>
      <button onclick="location.href = 'index.html';" class="w3-btn w3-hover-white"style="border-radius:0;width:45%;height:30px;margin-right:5px;padding:5px">Sign Out</button>

            </span>

        </div>

            <div class="dropdown" style="width:15%;position:absolute;right:15px;top:0;">
  <button class="w3-btn w3-margin" id="dLabel" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:rgba(122,0,1,0);font-size:40px">
    &#8801;
  </button>

  <div class="dropdown-menu" aria-labelledby="dLabel" style="position:absolute;top:100px;left:-85px;color:black;width:150px">

                        <p class="w3-center" style="font-size:20px">Font</p>
          <select id="input-font" class="w3-input w3-border"  onchange="changeFont (this);" style="color:black;margin-top:10px">

            <option value="Raleway" selected ="selected">Raleway</option>
            <option value="Times New Roman" >Times New Roman</option>
            <option value="Arial">Arial</option>
            <option value="Georgia">Georgia</option>
            <option value="Comic Sans MS">Comic Sans MS</option>
            <option value="Tahoma">Tahoma</option>
            <option value="Verdana">Verdana</option>
            <option value="Courier New">Courier New</option>

          </select>
          <br><br><br>
                        <p class="w3-center" style="font-size:20px">Font-size</p>
          <select id="input-size" class="w3-input w3-border"  onchange="changeSize (this);" style="color:black;margin-top:10px">

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
          <br><br><br>
          <p class="w3-center" style="font-size:20px">Font-color</p>
            <input class="w3-input jscolor {onFineChange:'setTextColor(this)'}" value="000000" style="margin-top:10px">
            <br>    
      </div>

    </div>
</div>

  <div id="bara-copie"></div>



<div class="animate-left side-bar" id="side-bar" style="float:left;overflow-y:auto;z-index:20">

      <button href="#" id="buton-close" style="background-color: Transparent;outline:none;border:none;font-size:45px;float:right;">&times;</button>

      <h2 class="w3-center">Discover & Journals</h2>

      <div style="width:100%;height:2px;background-color:black;margin:15px auto"></div>

      <button onclick="location.href = 'discover.html';" class="w3-btn w3-hover-white"style="font-size:1.2em;border-radius:0;width:100%;height:50px;margin:15px auto;padding:10px">Discover other journals</button>

      <div style="width:100%;height:2px;background-color:black;margin:15px auto"></div>
	
        <?php
        foreach($posts as $post) {
        ?>
        <button  type="button" data-toggle="modal" data-target="#journal-entry-<?php echo $post->id?>" style="border:none;background-color:white;color:black;width:100%;height:50px;font-size:16px">
            <?php echo $post->journal_title . "</button><div id='divider'></div>";
            }
            ?>


      <button type="button" class="w3-btn btn-info btn-lg" data-toggle="modal" data-target="#password-change" style="border-radius:0;width:90%;display:block;margin:10px auto;height:50px">Settings</button>

</div>

  
<?php echo form_open('scripts/insert_text'); ?>

<div class="w3-animate-zoom" id="notebook_page">
    <p class="w3-padding-top w3-center" style="font-size:28px">Writing a chapter of your life</p>
    <div style="width:80%;height:2px;background-color:black;clear:both;margin:0 auto"></div>

    <textarea id="text-jurnal" name="text-jurnal" autofocus></textarea>


    <div class="w3-right w3-padding-right">
        <button id="buton_trimitere" class="w3-btn w3-hover-white" type="button" data-toggle="modal"
                data-target="#myModal" style="margin-bottom:10px">Submit
        </button>
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
            <div class="modal-body w3-center" style="padding:0;margin:0">
                <div id="Demo2" class="w3-container w3-animate-zoom" style="margin:auto">
                    <form action="form.asp">
                        <br>
                        <h4>How would you like to name this chapter?</h4>
                        <input class="w3-input w3-border" name="journal-title" type="text">

                        <input class="w3-btn w3-padding w3-hover-white" type="submit" data-toggle="modal"
                               data-target="#myModal" style="width:100%;margin-top:16px"></button><br><br>
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
          <form class="w3-container w3-center">
            <h2>Changing your password</h2>

<?php echo form_open('scripts/change_password') ?> 
         
         <input placeholder="Old Password" id="old_pass" value="<?php echo set_value(md5('old_pass')); ?> " name="old_pass" class="w3-input w3-border" type="password" >

            <input placeholder="New Password"id="new_pw" value="<?php echo set_value('new_pw'); ?>" name="new_pw" class="w3-input w3-border" type="password">

            <input placeholder="Confirm Password" id="conf_pw" value="<?php echo set_value('conf_pw'); ?>" name="conf_pw" class="w3-input w3-border" type="password">

            <input class="w3-margin-top w3-btn w3-hover-white" if="submit" name="submit" type="submit" value="Change Password " style="width:100%">Change my password</button>
            <?php form_close(); ?>
            </form>
           
            <br><br>
          </form>
          <div id="divider"></div>
          <form class="w3-container w3-center">
            <h2>Changing your profile picture</h2>
            <div class="w3-row w3-margin-top">
                <div class="w3-half">
                  <h4>Current picture</h4>
                  <img class="w3-card-4 w3-margin-top" src="img/user-photo.png" style="width:100px;max-height:100px">
                </div>
                <div class="w3-half">

                  <div style="height:0px;overflow:hidden">
                  <input type="file" id="fileInput" name="fileInput" />
                  </div>

                  <h4>New picture</h4>
                  <img class="w3-card-4 w3-margin-top" src="img/user-photo.png" style="width:100px;max-height:100px"> <br><br>              
                  <button class="w3-btn w3-hover-white" type="button" onclick="chooseFile();" accept="image/*">Choose image</button>

                </div>
            </div>

          </form>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<div class="modal fade" id="journal-entry-1" role="dialog" style="width:100%;margin:0;padding:0;">
    <div class="modal-dialog">
    
      
      <div class="modal-content" style="background-color:#DACA97;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">School sucks | 16.05.2016</h4>
        </div>
        <div class="modal-body w3-center" style="padding:0;margin:0" >             
                <div id="Demo2" class="w3-container w3-animate-zoom" style="margin:auto;min-height:100px;min-height:100px;padding-top:15px;font-size:20px">
                    Imi vine sa adorm la scoala la >50% din ore, please help.
                </div>

              </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="journal-entry-2" role="dialog" style="width:100%;margin:0;padding:0;">
    <div class="modal-dialog">
    
      
      <div class="modal-content" style="background-color:#DACA97;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">I like pizza | 20.05.2016</h4>
        </div>
        <div class="modal-body w3-center" style="padding:0;margin:0" >             
                <div id="Demo2" class="w3-container w3-animate-zoom" style="margin:auto;min-height:100px;padding-top:15px;font-size:20px">
                    Astazi am mancat pizza de la DEJA VU si a fost atat de buna ca am mai comandat una.
                </div>

              </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="journal-entry-3" role="dialog" style="width:100%;margin:0;padding:0;">
    <div class="modal-dialog">
    
      
      <div class="modal-content" style="background-color:#DACA97;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lorem Ipsum | 30.05.2016</h4>
        </div>
        <div class="modal-body w3-center" style="padding:0;margin:0" >             
                <div id="Demo2" class="w3-container w3-animate-zoom" style="margin:auto;min-height:100px;padding-top:15px;font-size:20px">
                    Lorem ipsum dolor sit amet, qui perfecto expetenda adolescens eu, nec aeque labitur alterum ne, qui partiendo theophrastus et. Nec an efficiantur interpretaris, vis fuisset scribentur at, oportere iracundia moderatius vel eu. Ad illum luptatum detraxit qui, est an populo eruditi probatus, has persius invenire complectitur ei. Et per ludus euismod argumentum, ludus vivendo liberavisse pro ei, ei error omittam tincidunt vix. Ius et assum fuisset, dolore inimicus cum et, modus putent dolores eam id. Eos modo putent docendi ea, eam tale tibique menandri ne, eu dolores adolescens est.

Ei affert docendi vivendum mel, mei nobis vulputate in. Per reque mediocrem principes eu, mei decore consul tamquam cu, meis aperiam te vim. No accumsan quaestio per, vix viris insolens prodesset ei. Consul quaestio constituam cum in, delectus honestatis te pri. Vim eu veniam verterem, quas elitr ut vim.

Vivendo adipiscing nec an. Sed hinc utroque oporteat in, in case animal quo. Iuvaret legendos conceptam ei nec, ea eum adipisci qualisque, vim at agam labore maiorum. Quo ea cibo legere complectitur, suas phaedrum persecuti cu cum, mea ei ludus explicari vituperata.

Ex eum numquam menandri, an mea essent intellegebat, sit ea vituperata posidonium. Eu modo convenire temporibus sit. His impedit voluptua suavitate ut, ne everti albucius usu. Pro assum nominati ad, qui te vivendo dolores vulputate. Nullam malorum pertinacia pro ei.

Utamur vulputate duo te. Te ius iusto omnesque assentior, vim singulis pertinax ad, mea no soleat vidisse tibique. Sint viris ut eum. Summo vivendo signiferumque an nam, no pro vocent ocurreret.
                </div>

              </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script type="text/javascript">
   function chooseFile() {
      $("#fileInput").click();
   }

function changeSize(selectTag) {
    var listValue = selectTag.options[selectTag.selectedIndex].text;
    document.getElementById("text-jurnal").style.fontSize = listValue;
}

var changeFont = function(font){
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

$( "#buton" ).click(function() {
$( "#side-bar" ).toggle();
});

$( "#buton2" ).click(function() {
$( "#side-bar" ).toggle();
});

$( "#buton3" ).click(function() {
$( "#side-bar" ).toggle();
});

$( "#buton-close" ).click(function() {
$( "#side-bar" ).toggle();
});




$(function(){

    var $header = $('#bara-user-large');
    var $content = $('#side-bar');
    var $pagina = $('#notebook_page');
           var height = $(this).height() - $header.height();
       $content.height(height);
       $pagina.height(height-50);


});
</script>

</body>