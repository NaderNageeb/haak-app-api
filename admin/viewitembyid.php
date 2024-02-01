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
    
if(isset($_POST['provider_id']) && $_POST['provider_id'] !=''){

$provider_id = filterRequest("provider_id");

$sql = "SELECT i.item_name,i.item_description,i.expire_date,i.item_stock,i.item_image,
i.item_price,i.category_id,p.provider_id,p.provider_name,p.provider_address,p.provider_phone,p.provider_image,p.provider_email
 FROM `items_table` i , `providers` p where i.providerId = p.provider_id  and i.`providerId` = $provider_id and i.`item_del`= 0  order by i.itemId  ASC";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)){

while($row = mysqli_fetch_assoc($query)){
     $data[] = $row;
}
     echo json_encode(array("data"=>$data));

}else{

      echo  json_encode(array("status"=>"Faild"));
}

}else{
    echo json_encode(array("status"=>"Accces Denied"));
}

}else{

    echo json_encode(array("status"=>"Accces Denied"));
}

?>


