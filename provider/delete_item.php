<?php

include("../connect.php");

if(isset($_POST['provider_username']) && isset($_POST['provider_password'])){

    $provider_username = filterRequest("provider_username");
    $provider_password = filterRequest("provider_password");
    
    if($provider_username!='' && $provider_password !=''){ 
    $auth = Authintication_Provider($provider_username,$provider_password);
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
        exit;
    }
    
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
        exit;
    }
    
    if($auth == 1){

    if (isset($_POST['provider_id']) && $_POST['provider_id'] !='') {

    $provider_id = filterRequest("provider_id");

    $sql = "UPDATE `items_table` Set `item_del` = 1  where `providerId` = $provider_id ";
  $query = mysqli_query($conn,$sql);
if($query){
    
    echo json_encode(array("status"=>"success"));
}else{

      echo json_encode(array("status"=>"Faild"));
}


}else {
    echo json_encode(array("status"=>"Accces Denied"));
}

}else{
    echo json_encode(array("status"=>"Accces Denied"));
}

?>