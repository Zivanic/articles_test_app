<?php

// core configuration
include_once "../../core.php";
// db configuration
include_once "../../db_info.php";
// include login checker
$require_login = true;
include_once "../../login_check.php";
// get database connection
$database = new Database();
$db = $database->getConnection();

$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];

try{
    $sqlAdd='UPDATE articles SET title=:title,text=:text,edited_time=NOW() WHERE id=:id ';
    $queryAdd = $db->prepare($sqlAdd);
    $queryAdd->bindParam(':title',$title);
    $queryAdd->bindParam(':text',$text);
    $queryAdd->bindParam(':id',$id);
    $queryAdd->execute();
    
    echo json_encode('Edited');
  
    
} catch (PDOException $err){
     die(json_encode($err->getMessage()));
}
