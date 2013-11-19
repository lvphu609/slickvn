
<?php $url=  base_url();?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
  
  
  <link rel="stylesheet" href="<?php echo $url;?>/includes/js/masonry/style.css">
 
  <!--<script src="./Infinite Scroll · jQuery Masonry_files/saved_resource"></script> 

  <!-- scripts at bottom of page -->

  </head>

<body class="demos ">
<section id="content">
  
<div id="append_javascript_masonry">
  <div class="remove_javascript_masonry">    
    <script src="<?php echo $url;?>/includes/js/masonry/jquery-1.7.1.min.js"></script>
        <script src="<?php echo $url;?>/includes/js/masonry/jquery.masonry.min.js"></script>
        <!--<script src="<?php //echo $url;?>/includes/plugins/masonry/jquery.infinitescroll.min.js"></script>-->
        <script>
          $(function(){

            var $container = $('#container');

            $container.imagesLoaded(function(){
              $container.masonry({
                itemSelector: '.box',
                columnWidth: 5
              });
            });


          });
     </script>
   </div>
</div>