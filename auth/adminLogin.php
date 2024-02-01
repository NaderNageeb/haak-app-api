<?php 

include("../connect.php");

if(isset($_POST['username']) && $_POST['username'] !='' && isset($_POST['password']) && $_POST['password'] !=''){

$username =  filterRequest("username");
$password = md5(filterRequest("password"));

$sql = "SELECT * FROM `admin` where `admin_user_name` = '$username' and `admin_password` = '$password' and 	`admin_dell` = 0";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){

    $data = mysqli_fetch_assoc($query);
    
    echo json_encode(array("status"=>"success" , "data"=>$data));
}else{

     echo json_encode(array("status"=>"Faild"));
}
}else{
    echo json_encode(array("status"=>"Accces Denied"));
}
?>
