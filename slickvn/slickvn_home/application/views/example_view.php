<?php


   foreach ($post_list as $value) {
     $avatar=$value['avatar'];
     
     $ava=str_replace("[removed]","data:image/;base64,",$avatar);
    // $title=$value['title'];
    // $address=$value['address'];
   //  $favourite_type_list=$value['favourite_type_list'];
   //  $price_person_list=$value['price_person_list'];
   //  $culinary_style=$value['culinary_style'];
     $id_user=$value['id_user'];
     $content=$value['content'];
     $content=str_replace("[removed]","data:image/;base64,", $content);
  //   $action=$value['action'];
  //   $authors=$value['authors'];
  
     echo '<hr></br>';
     echo 'avatar: <img src="'.$ava.'"><br>';
     echo 'noi dung'; echo htmlspecialchars_decode ($content);
   //  echo $id_user;
  
    }





?>
