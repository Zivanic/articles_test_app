<?php

// core configuration
include_once "../core.php";
// db configuration
include_once "../db_info.php";
// include login checker
$require_login = true;
include_once "../login_check.php";
// get database connection
$database = new Database();
$db = $database->getConnection();

$id = $_POST['id'];
try {
    $sqlArt = 'SELECT * FROM articles WHERE id = :id ';
    $queryArt = $db->prepare($sqlArt);
    $queryArt->bindValue(':id', $id);
    $queryArt->execute();
    $resArt = $queryArt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($resArt);
} catch (PDOException $err) {
    die(json_encode($err->getMessage()));
}
