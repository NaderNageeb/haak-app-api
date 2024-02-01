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



 $data = array();

$sql = "SELECT * FROM `haak_delivery` where `deliv_del` = 0 and `deliv_status` = 0 order by delivery_man_id  ASC";
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

?>


