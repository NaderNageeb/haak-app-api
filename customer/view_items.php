<?php

include("../connect.php");

if(isset($_POST['customer_username']) && isset($_POST['customer_password'])){

    $customer_username = filterRequest("customer_username");
    $customer_password = filterRequest("customer_password");
    
    if($customer_username!='' && $customer_password !=''){ 
    $auth = Authintication_Customer($customer_username,$customer_password);
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
        exit;
    }
    
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
        exit;
    }
    
    if($auth == 1){


        $data = array();

        $sql = "SELECT * FROM `items_table`i,`table_category`c where i.category_id = c.category_id and i.`item_del` = 0 order by i.itemId  ASC";
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
    




    }else{
        echo json_encode(array("status"=>"Accces Denied"));
    }
    ?>
