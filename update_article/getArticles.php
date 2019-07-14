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


try{
    $sqlArt='SELECT * FROM articles INNER JOIN users ON users.id = articles.creator_id WHERE articles.creator_id = :id ';
    $queryArt = $db->prepare($sqlArt);
   	$queryArt->bindValue(':id',$user_id);
    $queryArt->execute();
    $resArt = $queryArt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($resArt);
  
    
} catch (PDOException $err){
     die(json_encode($err->getMessage()));
}
