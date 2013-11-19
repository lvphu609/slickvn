<?php
//include('db.php');

$url=$_GET['url'];
session_start();
$session_id='1'; //$session id
$path = "upload_temp/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg_post']['name'];
			$size = $_FILES['photoimg_post']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(2048*2048))
          
						{
              //get_date_time
            //  date_default_timezone_set('Australia/Melbourne');
              $date = date('d-m-Y_h-i-s_');
              $date_string=$date;
							$actual_image_name =uniqid($date_string).".".$ext;
							$tmp = $_FILES['photoimg_post']['tmp_name'];
              $url_image=$url."includes/plugins/post/upload_temp/".$actual_image_name;
              
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
							//	mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
									
									echo "
                    <img style='width:100px; height: 100px;' src='".$url_image."'  class='preview'>";
								  echo'<input type="hidden" value="'.$actual_image_name.'" id="img_content_post" name="img_content_post[]">';
                  
                }
							else
								echo "failed";
						}
						else
						echo "Image file size max 2 MB";					
						}
						else
						echo "định dạng ảnh không đúng..";	
				}
				
			else
				echo "<span style='color=\"#FFF\"'>Bạn chưa chọn ảnh đại diện bài viết..!</span>";
				
			exit;
		}
?>