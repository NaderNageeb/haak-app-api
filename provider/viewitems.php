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



    $data = array();

    $sql = "SELECT * FROM `items_table`i,`table_category`c where i.category_id = c.category_id and i.`providerId` = $provider_id  and i.`item_del` = 0 order by i.itemId  ASC";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
    
    while($row = mysqli_fetch_assoc($query)){
        $data[] = $row;
    }
         echo json_encode(array("data"=>$data));
    }else{
    
          echo  json_encode(array("status"=>"Faild"));
        //   echo $sql;
    }

    }else {
        echo json_encode(array("status"=>"Accces Denied"));
    }

    }else{
        echo json_encode(array("status"=>"error pass"));
    }

    ?>