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

            $provider_id = filterRequest("provider_id"); //requierd
            $cat_id = filterRequest("category_id");//requierd
            $item_name = filterRequest("item_name");//requierd
            $item_description  = filterRequest("item_description"); //optinal
            $expire_date = filterRequest("expire_date"); //optinal
            $item_stock = filterRequest("item_stock"); //optinal (deffult value 0)
            $item_price = filterRequest("item_price");//requierd

            // $item_image = _FILES['item_image'];//optinal

            if (isset($_FILES['item_image'])) {
                $file = $_FILES['item_image'];
            
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
                        $upload_directory = '../uploads/items/';
                        $new_file_name = mysqli_real_escape_string($conn,$file_name);
            // sql if item exist
            $sql_check = "SELECT * FROM `items_table` where
             `item_name` = '$item_name' and `item_del` = 0";
            $query_check = mysqli_query($conn,$sql_check);
            if(mysqli_num_rows($query_check)){
            
                echo json_encode(array("status"=>"Exist"));
            }else{
            // insert into db
                $sqli_insert = "insert into items_table(`providerId`,`category_id`,`item_name`,`item_description`,`expire_date`,`item_stock`,`item_image`,`item_price`) 
                values ('$provider_id','$cat_id','$item_name','$item_description','{$expire_date}','$item_stock','$new_file_name','$item_price')";
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
                $sql_check = "SELECT * FROM `items_table` where
                `item_name` = '$item_name' and `item_del` = 0";
            $query_check = mysqli_query($conn,$sql_check);
            if(mysqli_num_rows($query_check)){
            
               echo json_encode(array("status"=>"Exist"));
            }else{
            
                $sqli_insert = "insert into items_table(`providerId`,`category_id`,`item_name`,`item_description`,`expire_date`,`item_stock`,`item_price`) 
                values ('$provider_id','$cat_id','$item_name','$item_description','{$expire_date}','$item_stock','$item_price')";
               if($query_insert = mysqli_query($conn,$sqli_insert))
               {
                // echo $sqli_insert;
                echo json_encode(array("status"=>"success"));
               }else{
                  echo json_encode(array("status"=>"Faild"));
               }
            }
            
            }

 }else {
  echo json_encode(array("status"=>"Accces Denied"));
 }

    
    }else{
        echo json_encode(array("status"=>"Accces Denied"));
    }
    ?>