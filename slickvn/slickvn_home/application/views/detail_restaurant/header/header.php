<html>
<?php $url = base_url(); ?>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/default.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/menu.css" rel="stylesheet" /> 
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/footer_content.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/detail_restaurant/slide_show.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/detail_restaurant/detail_restaurant.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/detail_restaurant/location_page.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/detail_restaurant/carousel.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/detail_restaurant/tabs.css" rel="stylesheet" />
     <!--sub banner more, button animation nimble_style css-->
    <link type="text/css" href="<?php echo $url; ?>/includes/css/css_nimble_style_custom/style.css" rel="stylesheet" />
    <!--end sub banner more, nimble_style -->
    
    <!--slide show-->
    <script src="<?php echo $url; ?>/includes/plugins/smart_gallery/jquery-1.4.4.min.js" type="text/javascript"></script>
    <link href="<?php echo $url; ?>/includes/plugins/smart_gallery/smart-gallery.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo $url; ?>/includes/plugins/smart_gallery/smart-gallery.min.js" type="text/javascript"></script>
    <script src="<?php echo $url; ?>/includes/plugins/smart_gallery/smart-gallery.js" type="text/javascript"></script>
   
    <!--end slide show-->
    
    
    
<!--    sllide detail-->
<!-- First, add jQuery (and jQuery UI if using custom easing or animation -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="<?php echo $url; ?>/includes/plugins/gallery_detail_restaurant/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>/includes/plugins/gallery_detail_restaurant/js/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="<?php echo $url; ?>/includes/plugins/gallery_detail_restaurant/js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo $url; ?>/includes/plugins/gallery_detail_restaurant/css/jquery.galleryview-3.0-dev.css" />

<!-- Lastly, call the galleryView() function on your unordered list(s) -->
<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView();
	});
</script>


<!--end detail-->
    
    
    
    
    
    
    
    
    
    <!--back to top-->
    <style type="text/css">
        #top {
            width: 50px; height: 50px;
            position: fixed; bottom: 10px; right: 10px;
            text-indent: -99999px;
            cursor: pointer;
            background: url(<?php echo $url;?>includes/images/icon/go_top.png) no-repeat 0 0;
            
        }

     </style>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#back_to_top').append('<div id="top">Back to Top</div>');
            $('#top').fadeOut();
           $(window).scroll(function() {
            if($(window).scrollTop() != 0) {
                $('#top').fadeIn();
            } else {
                $('#top').fadeOut();
            }
           });
           $('#top').click(function() {
            $('html, body').animate({scrollTop:0},500);
           });
        });
     </script>
    <!--end back to top-->
    
    <!--rating-->
    	<link rel="stylesheet" href="<?php echo $url;?>includes/plugins/rating_jquery/jRating.jquery.css" type="text/css" />
      
      
   <!--end rating-->
    
</head>

<body>

<div id="container_main">
  