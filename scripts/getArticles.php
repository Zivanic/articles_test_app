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

$filter = $_POST['filter'];
$condition = '';

if($filter !== 'all'){
    $condition = 'WHERE articles.creator_id = :id ';
}
try{
    $sqlArt='SELECT * FROM articles INNER JOIN users ON users.id = articles.creator_id '.$condition;
    $queryArt = $db->prepare($sqlArt);
    $filter !== 'all' ? $queryArt->bindValue(':id',$filter) : '';
    $queryArt->execute();
    $resArt = $queryArt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($resArt);
  
    
} catch (PDOException $err){
     die(json_encode($err->getMessage()));
}
