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


try{
    $sqlUsr='SELECT * FROM users';
    $queryUsr = $db->prepare($sqlUsr);
    $queryUsr->execute();
    $resUsr = $queryUsr->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($resUsr);
  
    
} catch (PDOException $err){
     die(json_encode($err->getMessage()));
}
