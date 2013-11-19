<?php
class Upload_image extends CI_Controller{
  
  public function upload(){
    $this->load->helper('url');
    $this->load->view('upload_view');
    
  }
  
  public function a() {
      echo'upload_success <br>';
  mkdir("./images/A1/as", 0, true);
  }
  
  public function upload_success(){
    echo'upload_success <br>';
  mkdir("./images/A1/as");
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    
          $temp = explode(".", $_FILES["file"]["name"]);
          $extension = end($temp);
          
          if ((($_FILES["file"]["type"] == "image/gif")
          || ($_FILES["file"]["type"] == "image/jpeg")
          || ($_FILES["file"]["type"] == "image/jpg")
          || ($_FILES["file"]["type"] == "image/pjpeg")
          || ($_FILES["file"]["type"] == "image/x-png")
          || ($_FILES["file"]["type"] == "image/png"))
          
          && in_array($extension, $allowedExts))
            {
                if ($_FILES["file"]["error"] > 0)
                  {
                  echo "Error: " . $_FILES["file"]["error"] . "<br>";
                  }
                else
                  {
                  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                  echo "Type: " . $_FILES["file"]["type"] . "<br>";
                  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                  echo "Stored in: " . $_FILES["file"]["tmp_name"];
				  move_uploaded_file($_FILES["file"]["tmp_name"],
  "E:/Program Files/wamp/www/slickvn/include/images/tests/" . $_FILES["file"]["name"]);
				  
				  
                  }
            }
          else
            {
                 echo "định dạng không đúng";
            }
    
 

  }
  
  
}
?>
