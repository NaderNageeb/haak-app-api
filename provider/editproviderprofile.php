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
 $username =  filterRequest("username");
 $full_name =  filterRequest("full_name");
 $phone =  filterRequest("phone");
 $old_photo =  filterRequest("old_photo");
 $email  =  filterRequest("email");
 $address =  filterRequest("address");
 $password =  md5(filterRequest("password"));


 if (isset($_FILES['new_photo'])) {
    $file = $_FILES['new_photo'];
    

    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Get the file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Define allowed file extensions
    $allowed_extensions = array('jpg','jpeg', 'png','ico');
    // Define the maximum file size in bytes (e.g., 1MB = 1048576 bytes , 2MB = 2097152 bytes)
    $max_file_size = 1048576; // 1MB
   

    // Check if the file has a valid extension
    if (in_array($file_ext, $allowed_extensions)) {
        // Check if the file size is within the allowed limit
        if ($file_size <= $max_file_size) {
        // Check if there are no errors during the upload
        if ($file_error === 0) {
            // Specify the directory where you want to save the uploaded file
            $upload_directory = '../uploads/providers/';
            $new_file_name = mysqli_real_escape_string($conn, $file_name);
// Update data into db
    $sqli_update = "UPDATE `providers` SET  
     `provider_user_name` = '$username',
     `provider_name`='$full_name',
     `provider_phone` = '$phone' , 
     `provider_image` = '$new_file_name',
     `provider_email`='$email',
     `provider_address`= '$address',
     `provider_password` = '$password'
      where `provider_id` = $provider_id";
    if($query_update = mysqli_query($conn,$sqli_update))
    {
      
        if (file_exists($upload_directory . $old_photo)) {
            // echo "File already exists.";
            //  echo json_encode(array("massege"=>"File already exists","status"=>"success"));
            // unlink($file);
            unlink($upload_directory . $old_photo);
            move_uploaded_file($file_tmp, $upload_directory . $file_name);

            echo json_encode(array("status"=>"success"));
        } else {
            // Move the temporary file to the desired location
            move_uploaded_file($file_tmp, $upload_directory . $file_name);

             echo json_encode(array("status"=>"success"));
    }


    }else{
        echo  $sqli_update;
        echo json_encode(array("status"=>"Faild"));
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

    $sqli_update = "UPDATE `providers` SET  
    `provider_user_name` = '$username',
    `provider_name`='$full_name',
    `provider_phone` = '$phone', 
    `provider_image` = '$old_photo',
    `provider_email`='$email',
    `provider_address`= '$address',
    `provider_password` = '$password'
     where `provider_id` = $provider_id";
   if($query_update = mysqli_query($conn,$sqli_update))
   {
       echo json_encode(array("status"=>"success"));
   }else{
      echo json_encode(array("status"=>"Faild"));
    //   echo  $sqli_update;

   }
 
}



 }else {
    echo json_encode(array("status"=>"Accces Denied"));
 }

}else{
    echo json_encode(array("status"=>"Accces Denied"));
}
?>