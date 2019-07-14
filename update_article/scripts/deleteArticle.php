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

$art_id = $_POST['id'];


try {
    $sqlDel = 'DELETE FROM articles WHERE articles.id = :id ';
    $queryDel = $db->prepare($sqlDel);
    $queryDel->bindValue(':id', $art_id);
    $queryDel->execute();
    
    echo json_encode('Article removed');
} catch (PDOException $err) {
    die(json_encode($err->getMessage()));
}
