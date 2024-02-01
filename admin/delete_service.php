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
     if(isset($_POST['service_id']) && $_POST['service_id'] !=''){

        $service_id = filterRequest("service_id");
        
        $sql = "UPDATE `services` Set `service_del` = 1  where `service_id` = $service_id ";
        $query = mysqli_query($conn,$sql);
      if($query){
          
          echo json_encode(array("status"=>"success"));
      }else{
      
            echo json_encode(array("status"=>"Faild"));
      }
    

    }else{
      echo json_encode(array("status"=>"Accces Denied"));
    }
        
    }else{
        
     echo json_encode(array("status"=>"Accces Denied"));
    }
        
        ?>