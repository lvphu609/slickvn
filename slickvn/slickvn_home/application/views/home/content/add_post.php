<?php $url=  base_url(); ?>

<!--form_log_in  extend form_sign_up-->
<div id="form_sign_up">
  <div class="box_sign_up">
    <div class="box">
      
      <div class="box_left">
        <div class="title">
          <div class="title_left" >
            <div class="text">
              <span>Bài viết của bạn</span>
            </div>
          </div>
          <div class="title_right" >
            <div class="image">
            </div>
          </div>
        </div>
        <div class="sub_title_1">
        </div>
        <div class="line">
        </div>
        <div class="sub_title_2">
          <div class="left">
          </div>
          <div class="right">
          </div>
          
        </div>
        <div class="box_left_content">
          <!--input-->
          
            <!--<div class="form_sign_up">
            </div>-->
         <div class="form_input">
           <ul class="image">
             <li>
              <span>Hình ảnh đại diện bài viết</span><br>
              <!--upload images-->
              
                <script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.min.js"></script>
                <script type="text/javascript" src="<?php echo $url;?>includes/plugins/post/scripts/jquery.form.js"></script>
                <script type="text/javascript" >
                 $(document).ready(function() { 

                    $('#photoimg').live('change', function()			{ 
                          $("#preview").html('');
                          $("#preview").html('<img src="<?php echo $url;?>includes/plugins/post/loader.gif" alt="Uploading...."/>');
                          $("#imageform").ajaxForm({
                            target: '#preview',
                            success: function(data) {
                              console.log(data);
                            }
                          }).submit();

                    });
                  }); 
                </script>
                <form id="imageform" method="post" enctype="multipart/form-data" action="http://localhost/slickvn/include/modul_upload/avatar.php?url=<?php echo $url; ?>">
                <input type="file" name="photoimg" id="photoimg" />
                </form>
                
                
                <div style="width: 200px; height: 100px;" id='preview'>
                </div>
               
              
              
              <!--end upload images-->
            </li>
           </ul>
          <ul class="input"> 
             
            <li>
              <span>Tiêu đề bài viết</span><br>
              <textarea id="param_title_post" rows="3" cols="50" placeholder=" Tiêu đề bài viết"></textarea>
            </li>
            <li>
              <span>Địa chỉ</span><br>
              <textarea id="param_address_post" rows="3" cols="50" placeholder=" Địa chỉ"></textarea>
            </li>
            <li class="list_check_box">
              <form id="FormAddListing_Purpose">
                <span class="span_title">Mục đích</span><br>
                      <ul class="list_index">
                        
                    <?php  
                    
                     foreach ($favourite_list as $favourite_list) {
                       
                     echo'<li onclick="return onclickLiCheckListing_Purpose(this);" >
                            '.$favourite_list['name'].'<span class="checkbox" id="'.$favourite_list['id'].'"></span>
                          </li>';

                     }
                      
                    ?>
                     </ul>
               </form>
            </li >
            <li class="list_check_box">
              <form id="FormAddListing_Price_Person">
              <span class="span_title">Giá trung bình người</span><br>
              <ul class="list_index">
                 <?php  
                    
                     foreach ($price_persion as $price_persion) {
                       
                     echo'<li onclick="return onclickLiCheckListing_Price_Person(this);" >
                           '.$price_persion['name'].' <span class="checkbox" id="'.$price_persion['id'].'"></span>
                         </li>';

                     }
                      
                    ?>
                    
                  
               </ul>
              </form>
            </li>
            <li class="list_check_box">
              <form id="FormAddListing_Culinary_Style">
                <span class="span_title">Phong cách ẩm thực</span><br>
                <ul class="list_index">
                  <?php  
                    
                     foreach ($culinary_style as $culinary_style) {
                       
                     echo'<li onclick="return onclickLiCheckListing_Culinary_Style(this);" >
                           '.$culinary_style['name'].' <span class="checkbox" id="'.$culinary_style['id'].'"></span>
                         </li>';

                     }
                      
                    ?>
                   
                     
                 </ul>
               </form>
            </li>
            <li>
              <ul class="listSelectDanhBaDiaDiem">
                                                                       
               </ul>
            </li>
          </ul>
          </div>
          <div class="title_detail">
            <ul>
              <li>
                <span>Nội dung chi tiết</span><br>
              </li>
            </ul>
          </div>
      
         <div class="editor_custom">
           <!--ckeditor custom-->
       
           <form action="#" method="post">
              <p>
                <textarea  class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">
                    
                </textarea>
              </p>
              <!--<p>
                <input type="submit" value="Submit">
              </p>-->
            </form>


           
           
           <!--end ckeditor custom-->
         </div>
             
          <!--end input-->
          <div class="form_input">
           <ul class="image_content_post">
             <li>
              <span>Hình ảnh sử dụng cho bài viết</span><br>
              
               <!-- ajax upload button-->
                <script type="text/javascript" >
                  
                 $(document).ready(function() { 
                          var stt=1;
                          $('#photoimg_post').live('change', function(){
                            var next = stt+1;
                            var new_div_preview_post = "<div class='preview_post' id='preview_post_"+next+"'></div>";
                            $("#append_img_content").append(new_div_preview_post);
                            $("#preview_post_"+stt).html('');
                            $("#preview_post_"+stt).html('<img src="<?php echo $url;?>includes/plugins/post/loader.gif" alt="Uploading...."/>');
                            $("#imageform_post").ajaxForm({
                              target: "#preview_post_"+stt

                             }).submit();
                              stt=stt+1;
                          });
                  }); 
                </script>
                <form id="imageform_post" method="post" enctype="multipart/form-data" action="http://localhost/slickvn/include/modul_upload/content.php?url=<?php echo $url; ?>">
                <input type="file" name="photoimg_post" id="photoimg_post" />
                </form>
                
                <div id="append_img_content">
                  <div class="preview_post" id='preview_post_1'>
                  </div>
                  
                </div>
              
              <!--end ajax upload button-->
            </li>
           </ul>
          </div>
        </div>
        <div class="line_1">
        </div>
        <div class="sub_title_3">
          <div class="left">
          </div>
          <div class="right">
          </div>          
        </div>
        <div class="box_btn_sign_up">
         
            <a href="javascript:;"  id="btn_submit">
              <div class="btn_sign_up">
                <div class="image"></div>
                <div class="text"><span>Hoàn Tất</span></div>
              </div>
            </a>
     
        </div>
        <div class="footer_sign_up">
          <div class="footer_text">
            <span>Slick.vn</span>
          </div>
            
        </div>
        
      </div>
      
    </div>
  </div>
</div>

<div style="display: none;" id="trackingDiv" ></div>


<script>
CKEDITOR.replace( '#editor1', {
	fullPage: true,
	allowedContent: true
});
</script>

<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>
//function check purpose
function onclickLiCheckListing_Purpose(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_purpose[]" class="input_purpose_class" id="input_purpose' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Purpose').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_purpose" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}

//function check Price_Person
function onclickLiCheckListing_Price_Person(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_price_person[]" class="input_price_person_class" id="input_price_person' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Price_Person').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_price_person" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}
//function check culinary tyle
function onclickLiCheckListing_Culinary_Style(obj){
    if($(obj).find('span').first().hasClass('checkbox')){
            $(obj).find('span').first().removeClass('checkbox').addClass('checkboxSelect');
            var myText = $(obj).text();
            var id = $(obj).find('span').first().attr('id');
            var newEle = '<input type="hidden" name="arr_culinary_style[]" class="input_culinary_style_class" id="input_culinary_style' + id + '" value="' + id + '"/>';
                        
           // $('ul.listSelectDanhBaDiaDiem').append('<li class="select' + id + '">'+ $(obj).text()+'</li>');
            $('#FormAddListing_Culinary_Style').append(newEle);
        }else{
            $(obj).find('span').first().removeClass('checkboxSelect').addClass('checkbox');
            var id=$(obj).find('span').first().attr('id');
            $("#input_culinary_style" + id ).remove();
            
           // $('ul.listSelectDanhBaDiaDiem .select' + id).remove();
        }
}
  
  
//event click
  $('#btn_submit').click(function (){
    
   //    $('#remove_disable_screen').addClass('disabled_screen');
   //   $('#remove_image_load').addClass('image_load');
      //var url = $('#hidUrl').val();
      var url_api="http://localhost/slickvn/index.php/restaurant/restaurant_apis/update_post";
      var authors ="Vinh Phu";//full name user
      var id_user = "527b4f473fce119ed62d8597"; //id user
      var avatar=$('#image_represent_post').val();//hình đại diện bài viết
      var title=$('#param_title_post').val();//tiêu đề
      var address=$('#param_address_post').val();//địa chỉ
      
    //get array purpose to string========================================================>
      var elem_purpose = document.getElementsByClassName("input_purpose_class");
      //var names_purpose = [];
      var favourite_type_list="";
       for (var i = 0; i < elem_purpose.length; ++i) {
        if (typeof elem_purpose[i].value !== "undefined") {
            //names_purpose.push(elem_purpose[i].value);
            favourite_type_list +=elem_purpose[i].value+',';
          }
        }
        favourite_type_list=favourite_type_list.slice(0,-1);
   //end get array purpose to string========================================================>
   
   
   //get array Price_Person to string========================================================>
      var elem_price_person = document.getElementsByClassName("input_price_person_class");
      var price_person="";
       for (var i = 0; i < elem_price_person.length; ++i) {
        if (typeof elem_price_person[i].value !== "undefined") {
            price_person +=elem_price_person[i].value+',';
          }
        }
       price_person=price_person.slice(0,-1);
   
   
   //end get array Price_Person to string========================================================>
   
   //get array culinary_style  to string========================================================>
      var elem_culinary_style = document.getElementsByClassName("input_culinary_style_class");
      var culinary_style="";
       for (var i = 0; i < elem_culinary_style.length; ++i) {
        if (typeof elem_culinary_style[i].value !== "undefined") {
            culinary_style +=elem_culinary_style[i].value+',';
          }
        }
       culinary_style=culinary_style.slice(0,-1);
   
   
   //end get array culinary_style to string========================================================>
      var content_ckeditor=CKEDITOR.instances.editor1.getData();//nội dung chi tiết bài viết
      $('#trackingDiv').html(content_ckeditor);
      var content = $('#trackingDiv').html();

      function escapeHtml(unsafe) {
          return unsafe
               .replace(/&/g, "&amp;")
               .replace(/</g, "&lt;")
               .replace(/>/g, "&gt;")
               .replace(/"/g, "&quot;")
               .replace(/'/g, "&#039;");
       }
     
     content=escapeHtml(content);
     
   //get string image name of content

    var elem_img_content_post = document.getElementsByClassName("img_content_post");
    var img_content_post="";
    
    for (var i = 0; i < elem_img_content_post.length; ++i) {
        if (typeof elem_img_content_post[i].value !== "undefined") {
            img_content_post +=elem_img_content_post[i].value+',';
          }
        }
    img_content_post=img_content_post.slice(0,-1);
    //get array image name of content
    var array_images_content = new Array();
    for (var i = 0; i < elem_img_content_post.length; ++i) {
        if (typeof elem_img_content_post[i].value !== "undefined") {
            array_images_content[i]=elem_img_content_post[i].value;
          }
        }
    //lay ten nhung hinh anh có trong content
    var string_image_filter="";
    for (var i = 0; i < array_images_content.length; ++i) {
            if(content.indexOf(array_images_content[i])>-1)
              {
                string_image_filter+= array_images_content[i]+',';
              }
          
        }
     string_image_filter=string_image_filter.slice(0,-1);
    
    //mang hinh success
    var array_image=avatar+","+string_image_filter;
    
    
     
      var action= "insert";
       // alert(avatar);
      //  alert(title);
      //  alert(address);
      //  alert(favourite_type_list);
     //   alert(price_person);
     //   alert(culinary_style);
     //   alert(authors);
     //   alert(id_user);
      
     //   alert(content);
     //   alert(action);
     //   alert(img_content_post);   //image upload temp
        
     //   alert(array_image);  //image in content
        
        
        
        
        $.ajax({
          url: url_api ,
          type: 'POST',
          data:{
                  //avatar:avatar,
                  title:title,
                  address:address,
                  favourite_type_list:favourite_type_list,
                  price_person_list:price_person,
                  culinary_style_list:culinary_style,
                  authors:authors,
                  id_user:id_user,
                  content:content,
                  array_image: array_image,
                  action:action

          },
          success: function(data){
            
            alert('them thanh cong');
            location.reload();
            
          },

         //timeout:5000,
         error: function(a,textStatus,b){
           alert('khong thanh cong');
         }


        });
//        $.post(url_api, 
//               {  avatar:avatar,
//                  title:title,
//                  address:address,
//                  favourite_type_list:favourite_type_list,
//                  price_person_list:price_person,
//                  culinary_style:culinary_style,
//                  authors:authors,
//                  id_user:id_user,
//                  content:content,
//                  images_content: string_image_filter,
//                  action:action
//               
//                  },function(data,status){
//                      alert("Data: " + data + "\nStatus: " + status);
//                    });
        
      
        });
 
  
   
//  $.ajax({
//    url: 'http://192.168.1.151/slickvn/index.php/restaurant/restaurant_apis/update_post/format/json' ,
//    type: 'POST',
//    data:{
//      avatar:avatar,
//      title:title,
//      address:address,
//      favourite_type_list:favourite_type_list,
//      price_person:price_person,
//      culinary_style:culinary_style,
//      authors:authors,
//      id_user:id_user,
//      content:content,
//      action:action
//      
//    },
//    success: function(data){
//      
//      console.log(data);
//      
//    },
//    
//   //timeout:5000,
//   error: function(a,textStatus,b){
//     alert(textStatus);
//   }
//     
//    
//  });
  
  
  
  
  
</script>



<script type="text/javascript" src="<?php echo $url;?>includes/plugins/coppy_clipboard/jquery.zclip.js"></script>


<script>
  //coppy image to clipbored 
 function onclick_coppy_link_image(obj){
    console.log(window.clipboardData);
    //alert('hello');
    var link=$(obj).attr('id');
    //alert(link);
    
    if (window.clipboardData) // Internet Explorer
    {   
        window.clipboardData.setData('Text',link);
    }
    else{
//        var url = $('#hidUrl').val();       
//        var url_ZeroClipboard_swf= url+"includes/plugins/coppy_clipboard/ZeroClipboard.swf";
//        console.log(obj);
//        $('.coppy').zclip({
//          path:url_ZeroClipboard_swf,
//          copy: function() {
//            return link;
//          }
//        });
      
       //alert('not IE');
       window.prompt("Ctrl+C để coppy link ảnh", link);
    
    }
}


</script>