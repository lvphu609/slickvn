<?php $url=  base_url(); ?>


    
</section> <!-- #content -->


<!--load more-->

<div id="icon_load_more" class="">
</div>

<!--gọi đường dẫn url-->
<?php $url=  base_url(); ?>
<!--tạo 1 biến số trang khởi tạo ban đầu là 1-->
<div id="append_page_number_load_more">
  <input type="hidden" value="1" id="number_page_restaurant"> 
</div>
<!--gọi đường dẫn url vào input-->
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<!--javascript xử lý sự kiện scroll-->
<script>
  $(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
      //lấy giá trị trang khởi tạo ban đầu là 1 từ input id=number_page_restaurant
      var page_this = parseInt($('#number_page_restaurant').val());
      //cộng thêm vào trang hiện tại 1 đơn vị để sang trang tiếp
      var page_next= page_this; 
        page_next= page_next+1;
        var url = $('#hidUrl').val();        
        $('.remove_javascript_masonry').remove();
        $('#icon_load_more').addClass('icon_show');
        $.post( url + "index.php/restaurant_list_masonry/more_Restaurant", 
               { page: page_next}, function(data){
                      $("#number_page_restaurant").remove();          
                      var input_page_number='<input type="hidden" value="'+page_next+'" id="number_page_restaurant">'; 
                      var append_data_script= '<div class="remove_javascript_masonry">\n\
                                                   <script src="'+url+'/includes/js/masonry/jquery-1.7.1.min.js"><\/script>'+                         
                                                   '<script src="'+url+'/includes/js/masonry/jquery.masonry.min.js"><\/script>'+
                                                    '<script>'+'$(function(){'+

                                                          'var $container = $(\'#container\');'+

                                                          '$container.imagesLoaded(function(){'+
                                                            '$container.masonry({'+
                                                              'itemSelector: \'.box\','+
                                                              'columnWidth: 5'+
                                                            '});'+
                                                          '});'+


                                                          '});'+
                                                     '<\/script>'+
                                                   '</div>';
                                           
                      $('#append_javascript_masonry').append(append_data_script);
                      $('#container').append(data);
                      $('#append_page_number_load_more').append(input_page_number);
                      $('#icon_load_more').removeClass('icon_show');
                      
                });
   }
});
</script>
  
  
  
  
  
  
  


</body>
</html>