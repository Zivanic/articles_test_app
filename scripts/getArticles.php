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

$curPage = $_POST['curPage'];
$total = (10 * $curPage) - 10;

$filter = $_POST['filter'];
$condition = '';

if($filter !== 'all'){
    $condition = 'WHERE articles.creator_id = :id ';
}
try{
    $sqlArt='SELECT * FROM articles INNER JOIN users ON users.id = articles.creator_id '.$condition . ' LIMIT ' . $total . ',10';
    $queryArt = $db->prepare($sqlArt);
    $filter !== 'all' ? $queryArt->bindValue(':id',$filter) : '';
    $queryArt->execute();
    $resArt = $queryArt->fetchAll(PDO::FETCH_ASSOC);
    

    $SQLCOUNT = 'SELECT COUNT(*) AS rowCount FROM articles INNER JOIN users ON users.id = articles.creator_id '.$condition;
    $count = $db->prepare($SQLCOUNT);
    $filter !== 'all' ? $count->bindValue(':id',$filter) : '';
	$count->execute();
    $rowCount = $count->fetch(PDO::FETCH_ASSOC);




    echo json_encode(array("res"=>$resArt,'rowCount' => $rowCount));
  
    
} catch (PDOException $err){
     die(json_encode($err->getMessage()));
}
