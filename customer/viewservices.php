<?php 

include("../connect.php");


 $data = array();


$sql = "SELECT * FROM `services` where `service_del` = 0 order by service_id  ASC";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)){

while($row = mysqli_fetch_assoc($query)){
    $data[] = $row;
}
     echo json_encode(array("data"=>$data));

}else{

      echo  json_encode(array("status"=>"Faild"));
      
}

?>


