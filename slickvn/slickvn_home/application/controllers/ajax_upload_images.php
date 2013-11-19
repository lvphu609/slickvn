<?php


class Ajax_upload_images{
  
  
  public function upload_images(){
      /*$uploaddir = '././includes/images/ajax_upload_images/uploads/';
      //$_FILES['uploadfile']['name']
      //$type = $_FILES['uploadfile'] ['type'];
      $name=  uniqid().".png";
      $file = $uploaddir . basename($name);      
      if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
        echo "success"; 
      } else {
        echo "error";
      }*/
      
      $uploaddir = '././includes/images/ajax_upload_images/uploads/';
      $uploaddir_rename='././includes/images/ajax_upload_images/image_save/';
     // $name_uniqid= uniqid()."png";
      $file = $uploaddir . basename($_FILES['uploadfile']['name']);      
      if (move_uploaded_file($_FILES['uploadfile'] ['tmp_name'], $file)) { 
        echo "success"; 
       // copy($uploaddir.$file,$uploaddir_rename.$file);
      } else {
        echo "error";
      }
      
    }
    
    
}
?>