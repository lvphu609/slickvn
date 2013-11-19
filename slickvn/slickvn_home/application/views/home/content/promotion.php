
<?php $url=  base_url();?> 


<div id="promotion">
  <!--Title Khuyến Mãi-->
    <div class="promotion_title">
       <div class="promotion_title_custom_center">
        <div class="title_left"></div>
       </div>
    </div>
   <!--end title Khuyến mãi--> 
   
  
   <!--danh sách nhà hàng khuyến mãi-->
   <div id="restaurant_list_content">
       <div class="box_restaurant_content">
          <div class="box_restaurant_content_custom_center">
          <ul class="append_Promotion">
            <?php 
              foreach ($promotion_list as $promotion_list){
                $id= $promotion_list['id'];
                $coupon_value=$promotion_list['coupon_value'];
                $deal_to_date=$promotion_list['deal_to_date'];
                $restaurant_name=$promotion_list['restaurant_name'];
                $content=$promotion_list['content'];
                $image_link=$promotion_list['image_link'];
                $link_to=$promotion_list['link_to'];
                
                
                echo '
                      <li>
                        <div class="detail_box">
                                <div class="promotion_custom">
                                  <div class="img_item">
                                      <a href="'.$link_to.'">
                                        <img src="'.$image_link.'" title="'.$restaurant_name.'" alt="'.$restaurant_name.'" >
                                      </a>
                                  </div>
                                  <div class="info_promotion">
                                        <div class="title">
                                           <a href="'.$link_to.'">'.$restaurant_name.'</a>
                                        </div>
                                        <div class="info_promotion">
                                           '.$content.'
                                        </div>
                                  </div>
                               </div>
                       </div> 
                     </li>
                ';
                
                
                
              }
            
            ?>
          </ul>
            
          <ul id="more_Promotion">
           <li class="li_more">
               <a href="javascript:;" id="btn_More_Promotion">
                    <div class="button_more">
                      <div class="text"><span>Xem thêm</span></div>
                    </div>
                </a>
            </li> 
          </ul>            
         </div>
       </div>
    </div>
  <!--end danh sách nhà hàng khuyến mãi-->   
   
</div>

<!--javascrip append <li> to <ul>-->
<input type="hidden" value="1" id="number_page_promotion"> 
<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>

  $(function(){
    var page_this_promotion = parseInt($('#number_page_promotion').val());
    var page_next_promotion= page_this_promotion; 
    $('#btn_More_Promotion').click(function() {
     // more_Newest_Restaurant();
      page_next_promotion= page_next_promotion+1;
      //alert(page_next);
      
      var url = $('#hidUrl').val();
      $.post( url + "index.php/home_controller/more_Promotion", 
               { page_promotion: page_next_promotion}, function(data){
                                  
                                  $('.append_Promotion').append(data);
                                  if(data==""){
                                    //alert('het');
                                    $("#more_Promotion").remove();
                                  }
                                  
                                  });

    });
    
  }); 
</script>   
<!--end javascrip append <li> to <ul>-->

