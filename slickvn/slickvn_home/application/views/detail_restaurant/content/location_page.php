
<?php $url=  base_url();
  foreach ($info_restaurant as $info_detail_restaurant) {
   

      $id=                    $info_detail_restaurant['id'];
      $id_user=               $info_detail_restaurant['id_user'];
      $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
      $id_coupon=             $info_detail_restaurant['id_coupon'];
      $name=                  $info_detail_restaurant['name'];
      $number_view=           $info_detail_restaurant['number_view'];
      $number_assessment=     $info_detail_restaurant['number_assessment'];
      $rate_point=            $info_detail_restaurant['rate_point'];
      $number_like=           $info_detail_restaurant['number_like'];
      $number_share=          $info_detail_restaurant['number_share'];
      $rate_service=          $info_detail_restaurant['rate_service'];
      $rate_landscape=        $info_detail_restaurant['rate_landscape'];
      $rate_taste=            $info_detail_restaurant['rate_taste'];
      $rate_price=            $info_detail_restaurant['rate_price'];
      $address=               $info_detail_restaurant['address'];
      $image_introduce_link=  $info_detail_restaurant['image_introduce_link'];
      $image_carousel_link=   $info_detail_restaurant['image_carousel_link'];
      $link_to=               $info_detail_restaurant['link_to'];
      $phone_number=          $info_detail_restaurant['phone_number'];
      $working_time=          $info_detail_restaurant['working_time'];
      $status_active=         $info_detail_restaurant['status_active'];
      $favourite_list=        $info_detail_restaurant['favourite_list'];
      $price_person_list=     $info_detail_restaurant['price_person_list'];
      $culinary_style_list=   $info_detail_restaurant['culinary_style_list'];
      $mode_use_list=         $info_detail_restaurant['mode_use_list'];
      $payment_type_list=     $info_detail_restaurant['payment_type_list'];
      $landscape_list=        $info_detail_restaurant['landscape_list'];
      $other_criteria_list=   $info_detail_restaurant['other_criteria_list'];
      $introduce=             $info_detail_restaurant['introduce'];
      $start_date=            $info_detail_restaurant['start_date'];
      $end_date=              $info_detail_restaurant['end_date'];
      $created_date=          $info_detail_restaurant['created_date'];


 }

 

?>

<div id="location_page">
  <div class="box_location_page_center">
    <div class="location_page_detail">
      <a href="<?php echo $url;?>index.php/"><div class="logo_home"></div></a>
      <div class="text_location">
        <div class="icon_grater_than">></div>
        <span><div class="text_detail">Nhà hàng</div></span>
        <div class="icon_grater_than">></div>
        <span><div class="text_detail"><?php echo $name; ?></div></span>        
      </div>
    </div>
    <div class="line_bottom_location_page"></div>
  </div>  
</div>