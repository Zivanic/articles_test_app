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


try {
    $sqlArt = 'SELECT articles.id AS art_id, articles.title, articles.text,articles.created_time,articles.cover_url, users.id,users.first_name,users.last_name FROM articles INNER JOIN users ON users.id = creator_id ORDER BY articles.created_time DESC ';
    $queryArt = $db->prepare($sqlArt);
    $queryArt->execute();
    $resArt = $queryArt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resArt);
} catch (PDOException $err) {
    die(json_encode($err->getMessage()));
}

