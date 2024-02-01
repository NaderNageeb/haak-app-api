<?php 

include("../connect.php");


if(isset($_POST['admin_username']) && isset($_POST['admin_password'])){

    $admin_username = filterRequest("admin_username");
    $admin_password = filterRequest("admin_password");
    
    if($admin_username!='' && $admin_password !=''){ 
    $auth = Authintication($admin_username,$admin_password);
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
        exit;
    }
    
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
        exit;
    }
    
    if($auth == 1){
     if(isset($_POST['category_id']) && $_POST['category_id'] !=''){

        $category_id = filterRequest("category_id");















        
        
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
      }
          
      }else{
          
       echo json_encode(array("status"=>"Accces Denied"));
      }
          
          ?>