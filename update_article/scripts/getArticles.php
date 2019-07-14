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

$filter = $_POST['filter'];
$user_id = $_SESSION['user_id'];
$condition = '';
if($filter != 'all'){
    $condition = 'AND articles.id = :art_id ';
};

try {
    $sqlArt = 'SELECT articles.id AS art_id, articles.title, articles.text, users.id FROM articles INNER JOIN users ON users.id = creator_id WHERE articles.creator_id = :id '.$condition;
    $queryArt = $db->prepare($sqlArt);
    $queryArt->bindValue(':id', $user_id);
    $filter != 'all' ? $queryArt->bindValue(':art_id', $filter) : '';
    $queryArt->execute();
    $resArt = $queryArt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resArt);
} catch (PDOException $err) {
    die(json_encode($err->getMessage()));
}
