
<script>
 /* window.onload=fixHeight;
  function fixHeight() {
  getElementById('div_register').setAttribute("#menu_main","width:2000px");
}
  
 
 // $('#menu_main'). .style.height = height + 'px';*/
</script>



<?php $url=  base_url();  ?>

<div id="menu_main"  style="height: 2000px;">
  <div class="box_menu">
    <ul>
      <li>
        <div class="box_text_detail">
          <a href="<?php echo $url;?>index.php/admin/admin_controller">
            <div class="text">
              <span><div class="align_center">Trang chính</div></span>
            </div>
          </a>
          <div id="update_class_chosed" <?php if($chosed=="main_page"){echo 'class="image"';} ?>>            
          </div>
        </div>
      </li>
      
      <li>
        <div class="box_text_detail">
          <a href="<?php echo $url;?>index.php/admin/admin_controller/member_page">
            <div class="text">
              <span><div class="align_center">Thành viên</div></span>
            </div>
          </a>
          <div id="update_class_chosed"  <?php if($chosed=="member_page"){echo 'class="image"';} ?> >            
          </div>
        </div>
      </li>
      
      <li>
        <div class="box_text_detail">
          <a href="<?php echo $url;?>index.php/admin/admin_controller/user_page">
            <div class="text">
              <span><div class="align_center">Người dùng</div></span>
            </div>
          </a>
          <div id="update_class_chosed" <?php if($chosed=="user_page"){echo 'class="image"';} ?>>            
          </div>
        </div>
      </li>
      
      <li>
        <div class="box_text_detail">
          <a href="<?php echo $url;?>index.php/admin/admin_controller/restaurant_page">
            <div class="text">
              <span><div class="align_center">Nhà hàng</div></span>
            </div>
          </a>
          <div id="update_class_chosed" <?php if($chosed=="restaurant_page"){echo 'class="image"';} ?>>            
          </div>
        </div>
      </li>
      
      <li>
        <div class="box_text_detail">
          <a href="<?php echo $url;?>index.php/admin/admin_controller/coupon_page">
            <div class="text">
              <span><div class="align_center">Khuyến mãi</div></span>
            </div>
          </a>
          <div id="update_class_chosed" <?php if($chosed=="coupon_page"){echo 'class="image"';} ?>>            
          </div>
        </div>
      </li>
      
      <li>
        <div class="box_text_detail">
          <a href="<?php echo $url;?>index.php/admin/admin_controller/post_page">  
            <div class="text">
              <span><div class="align_center">Bài viết</div></span>
            </div>
          </a>
          <div id="update_class_chosed" <?php if($chosed=="post_page"){echo 'class="image"';} ?>>            
          </div>
        </div>
      </li>
      
      
      <li>
        <div class="box_text_detail">
           <a href="<?php echo $url;?>index.php/admin/admin_controller/custom_page"> 
            <div class="text">
              <span><div class="align_center">Tùy chỉnh</div></span>
            </div>
           </a>
          <div id="update_class_chosed" <?php if($chosed=="custom_page"){echo 'class="image"';} ?>>            
          </div>
        </div>
      </li>
      
      
      
      
    </ul>
  </div>
</div>












<!--

<a href="#" id="one" /><br>
<a href="#" id="two" /><br>
<a href="#" id="three" /><br>
<div id="result"  class="functions"></div>


    $.ajaxSetup({
        cache: false
    });
    var ajax_load = "<img class='loading' src='img/load.gif' alt='loading...' />";


    var loadUrl = "content.php";
    $("#one").click(function () {
    $("#result").html(ajax_load).load(loadUrl);
    });

    var load2Url = "content1.php";
    $("#two").click(function () {
    $("#result").html(ajax_load).load(loadUrl);
    });

    var load3Url = "content2.php";
    $("#three").click(function () {
        $("#result").html(ajax_load).load(load2Url);
    });


-->