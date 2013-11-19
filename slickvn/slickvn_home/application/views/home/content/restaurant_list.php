<?php $url=  base_url();
      $url_res_frofile=$link_restaurant_frofile;

?>
<div id="restaurant_list">  
  <!--Title NHÀ HÀNG-->
    <div class="restaurant_list_title">
      <div class="restaurant_list_title_custom_center">
        <a href="<?php echo $url; ?>index.php/restaurant_list_masonry">
          <div class="title_left"></div>
        </a>
        <div class="title_right">
          <ul>
            <li id="status_clicked_1" class="active_list">
              <a href="javascript:;" id="Grid_Tool">
                <div class="left_list" >
                  <div class="icon_left_list"></div>
                  <div class="text_align_center"><span>Dạng lưới</span></div>
                </div>
              </a>
            </li>
            <li id="status_clicked_2" >
              <a href="javascript:;" id="List_Tool">
                <div class="mid_list" >
                  <div class="icon_mid_list"></div>
                  <div class="text_align_center"><span>Danh sách</span></div>
                </div>
              </a>
            </li>
            <li id="status_clicked_3">
              <a href="javascript:;" id="Simple_Tool">
                <div class="right_list" >
                  <div class="icon_right_list"></div>
                  <div class="text_align_center"><span>Đơn giản</span></div>
                </div>
              </a>
            </li>
          </ul>      
        </div>
       </div>    
    </div>
   <!--end title NHÀ HÀNG-->    
</div>

<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<!--javascrip append data to Grid List Simple -->
<script>
  $(function(){
    
     /*hiển thị dạng lưới---------------------------------------*/
    $('#Grid_Tool').click(function() {
      //alert("list");
      var url = $('#hidUrl').val();
      $.post( url + "index.php/append_restaurant_newest_Grid_controller", 
               { status: "list" }, function(data){
                                  $("#status_clicked_1").addClass('active_list');
                                  $("#status_clicked_2").removeClass('active_list');
                                  $("#status_clicked_3").removeClass('active_list');
                                    
                                  $("#remove_Res_Newest_List").remove();
                                  $('#append_Res_Newest_List').append(data);
 
                                  });
      $.post( url + "index.php/append_restaurant_orther_Grid_controller", 
               { status: "list" }, function(data1){
                                    
                                  $("#remove_Res_Orther_List").remove();
                                  $('#append_Res_Orther_List').append(data1);
                                  });                            
                                  
                                  
    });
    
    
    /*hiển thị dạng danh sách---------------------------------------*/
    $('#List_Tool').click(function() {
      //alert("list");
      var url = $('#hidUrl').val();
      $.post( url + "index.php/append_restaurant_newest_List_controller", 
               { status: "list" }, function(data){
                                  
                                  $("#status_clicked_1").removeClass('active_list');
                                  $("#status_clicked_2").addClass('active_list');
                                  $("#status_clicked_3").removeClass('active_list');
                                  $("#remove_Res_Newest_List").remove();                                  
                                  $('#append_Res_Newest_List').append(data);
                                  });
      $.post( url + "index.php/append_restaurant_orther_List_controller", 
               { status: "list" }, function(data1){ 
                                  $("#remove_Res_Orther_List").remove();
                                  $('#append_Res_Orther_List').append(data1);
                                  });                            
                                  
                                  
    });
    
    
    /*hiển thị dạng đơn giản--------------------------------------*/
    $('#Simple_Tool').click(function() {
       //alert("hello");
      var url = $('#hidUrl').val();
      $.post( url + "index.php/append_restaurant_newest_Simple_controller", 
               { status: "list" }, function(data){
                                  $("#status_clicked_1").removeClass('active_list');
                                  $("#status_clicked_2").removeClass('active_list');
                                  $("#status_clicked_3").addClass('active_list');
                                  $("#remove_Res_Newest_List").remove();                                  
                                  $('#append_Res_Newest_List').append(data);
                                  });
      $.post( url + "index.php/append_restaurant_orther_Simple_controller", 
               { status: "list" }, function(data1){ 
                                  $("#remove_Res_Orther_List").remove();
                                  $('#append_Res_Orther_List').append(data1);
                                  });                            
                                  
    });
     
    
    
  }); 
</script>   
<!--end javascrip append <li> to <ul>-->
