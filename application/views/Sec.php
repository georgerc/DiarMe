<div class="dropdown" style="height:15px;width:70px;position:absolute;right:15px;bottom:10px;padding:0;line-height:12px">
<button onclick="dropdown()" class="dropbtn" style="border-radius:0;height:15px;width:70px;position:absolute;top:0;line-height:8px;color:black">&#x25BC</button>
  <div id="myDropdown" class="dropdown-content" style="width:250px;overflow-y:auto;padding-top:25px;max-height:800px">
      <span style="font-size:26px">My journals</span><div id="divider"></div>

   <div class="w3-container" style="width:100%;padding:0">
          <?php 
            foreach($posts as $post) {
              ?> 
              <button  type="button" data-toggle="modal" data-target="#journal-entry-<?php echo $post->id?>" style="border:none;background-color:white;color:black;width:100%;height:50px;font-size:16px">
              <?php echo $post->journal_title . "</button><div id='divider'></div>"; 

            


              }
              ?>

        </div>

  </div>
</div>

        </div>


  </div>
