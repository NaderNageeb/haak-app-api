<?php 

// database Connection

$conn = mysqli_connect("localhost","root","","haakdb");
mysqli_set_charset($conn,'UTF8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');
// this line to make my json api accept arabic language
header('Content-Type: application/json; charset=utf-8');
// this line to make my json api accept arabic language

global $conn; 


if($conn){
    // echo "connection is good";
}else{
    echo "Database Not Found";
}

// i used this function for security to filtr the request;
function filterRequest($requestname)
{
    global $conn; 

    return mysqli_escape_string($conn, htmlspecialchars(strip_tags($_POST[$requestname])));

}

function Authintication($admin_username,$admin_password){
    global $conn;

 $sql = "SELECT * FROM `admin` where `admin_user_name` = '$admin_username' and `admin_password` = '$admin_password' and `admin_dell` = 0";
 $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query)>0){

  return 1;
 }else{
   return 2 ;
 }

}

function Authintication_Provider($provider_username,$provider_password){
    global $conn;

 $sql = "SELECT * FROM `providers` where `provider_user_name` = '$provider_username' and `provider_password` = '$provider_password' and `provider_dell` = 0";
 $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query)>0){

  return 1;
 }else{
   return 2 ;
 }

}

function Authintication_Customer($customer_username,$customer_password){
    global $conn;

 $sql = "SELECT * FROM `customers` where `customerUserName` = '$customer_username' and `customerPassword` = '$customer_password' and `customerDel` = 0";
 $query = mysqli_query($conn,$sql);
 if(mysqli_num_rows($query)>0){

  return 1;
 }else{
   return 2 ;
 }

}













?>