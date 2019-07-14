<?php
// core configuration
include_once "../core.php";
// db configuration
include_once "../db_info.php";
// include login checker
$require_login=true;
include_once "../login_check.php";
// get database connection
$database = new Database();
$db = $database->getConnection();

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$text = $_POST['text'];

try{
    $sqlAdd='INSERT INTO articles VALUES (NULL,:title,:text,:id,NOW(),NULL) ';
    $queryAdd = $db->prepare($sqlAdd);
    $queryAdd->bindParam(':title',$title);
    $queryAdd->bindParam(':text',$text);
    $queryAdd->bindParam(':id',$user_id);
    $queryAdd->execute();
    
    echo json_encode(array("message"=>'succsess',"username"=>$_SESSION['username']));
  
    
} catch (PDOException $err){
     die(json_encode($err->getMessage()));
}
