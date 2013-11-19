<?php
//include('db.php');
$url="http://localhost/slickvn/include/modul_upload/upload_temp/";
session_start();
$session_id='1'; //$session id
$path = "upload_temp/";

	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
              //get_date_time
            //  date_default_timezone_set('Australia/Melbourne');
              $date = date('d-m-Y_h-i-s_');
              $date_string=$date;
							$actual_image_name ="avatar_".uniqid($date_string).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
              $url_image=$url.$actual_image_name;
              
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
							//	mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
									
									echo "
                                 <img src='".$url_image."'  class='preview'>";
								  echo'<input type="hidden" value="'.$actual_image_name.'" id="image_represent_post">';
                  
                }
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "định dạng ảnh không đúng..";	
				}
				
			else
				echo "<span style='color=\"#FFF\"'>Bạn chưa chọn ảnh đại diện bài viết..!</span>";
				
			exit;
		}
?>