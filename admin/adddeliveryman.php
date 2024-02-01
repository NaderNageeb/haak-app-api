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


if(isset($_POST['delivery_username']) && $_POST['delivery_username'] !=""){

$full_name = filterRequest("full_name");
$username = filterRequest("delivery_username");
$phone = filterRequest("phone");
$password = md5(filterRequest("password"));
$address = filterRequest("address");
$email = filterRequest("email");


 

if (isset($_FILES['delivery_photo'])) {
    $file = $_FILES['delivery_photo'];

    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Get the file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Define allowed file extensions
    $allowed_extensions = array('jpg', 'jpeg', 'png','ico');
    // Define the maximum file size in bytes (e.g., 1MB = 1048576 bytes , 2MB = 2097152 bytes)
    $max_file_size = 1048576; // 1MB
   

    // Check if the file has a valid extension
    if (in_array($file_ext, $allowed_extensions)) {
        // Check if the file size is within the allowed limit
        if ($file_size <= $max_file_size) {
        // Check if there are no errors during the upload
        if ($file_error === 0) {
            // Specify the directory where you want to save the uploaded file
            $upload_directory = '../uploads/delivery/';
            $new_file_name = mysqli_real_escape_string($conn, $file_name);
// insert into db
$sql_check = "SELECT * FROM `haak_delivery` where
 `delivery_username` = '$username' and `deliv_del` = 0";
$query_check = mysqli_query($conn,$sql_check);
if(mysqli_num_rows($query_check)){

    echo json_encode(array("status"=>"Exist"));
}else{

    $sqli_insert = "insert into haak_delivery(`deliv_full_name`,`delivery_username`,`delivery_phone`,`deliv_password`,`deliv_address`,`deliv_email`,`deliv_photo`) 
    values ('$full_name','$username','$phone','$password','$address','$email','$new_file_name')";
    if($query_insert = mysqli_query($conn,$sqli_insert))
    {
        // echo " Data Inserted";
        // Move the temporary file to the desired location
        // move_uploaded_file($file_tmp, $upload_directory . $file_name);

        if (file_exists($upload_directory . $file_name)) {
            // echo "File already exists.";
            echo json_encode(array("massege"=>"File already exists","status"=>"success"));
        } else {
            // Move the temporary file to the desired location
            move_uploaded_file($file_tmp, $upload_directory . $file_name);

             echo json_encode(array("status"=>"success"));
    }


    }else{
       // echo  $sqli_insert;
        echo json_encode(array("status"=>"Faild"));
    }

}
        } else {
            echo json_encode(array("status"=>"Uplaoding_Error"));
        } 
    } else {
            // echo "File size exceeds the maximum limit of " . $max_file_size . " bytes.";
            echo json_encode(array("status"=>"File_size_Error"));

        }
    } else {
        // echo "Invalid file extension. Only JPG, JPEG, and PNG files are allowed.";
        echo json_encode(array("status"=>"Invalid_file_extension"));
    }
}else{


    // insert into db
    $sql_check = "SELECT * FROM `haak_delivery` where
    `delivery_username` = '$username' and `deliv_del` = 0";
   $query_check = mysqli_query($conn,$sql_check);
if(mysqli_num_rows($query_check)){

   echo json_encode(array("status"=>"Exist"));
}else{

    $sqli_insert = "insert into haak_delivery(`deliv_full_name`,`delivery_username`,`delivery_phone`,`deliv_password`,`deliv_address`,`deliv_email`) 
    values ('$full_name','$username','$phone','$password','$address','$email')";
   if($query_insert = mysqli_query($conn,$sqli_insert))
   {
 
       echo json_encode(array("status"=>"success"));
   }else{
    
      echo json_encode(array("status"=>"Faild"));
    
   }
 }
}
   }else{
     echo json_encode(array("status"=>"Accces Denied"));
 //   return header("location:404");
}

}else{
    echo json_encode(array("status"=>"Accces Denied"));
}


?>



