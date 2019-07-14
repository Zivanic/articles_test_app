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

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$text = $_POST['text'];

if (isset($_FILES['file'])) {
// ...

    $errors = [];
    $path = '../../cover_photos/';
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_ext = explode('.', $file_name);
    $file_ext = end($file_ext);

    $file = $path . $file_name;

    if (!in_array($file_ext, $extensions)) {
        $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
        die(json_encode(array("message" => 'error', "error" => $errors)));
    }
    if (empty($errors)) {
        move_uploaded_file($file_tmp, $file);
    }
    $url = 'cover_photos/' . $file_name;
}


try {
    $sqlAdd = 'INSERT INTO articles VALUES (NULL,:title,:text,:id,NOW(),NULL,:cover_url) ';
    $queryAdd = $db->prepare($sqlAdd);
    $queryAdd->bindParam(':title', $title);
    $queryAdd->bindParam(':text', $text);
    $queryAdd->bindParam(':id', $user_id);
    $queryAdd->bindParam(':cover_url', $url , PDO::PARAM_STR);
    
    $queryAdd->execute();

    echo(json_encode(array("message" => 'succsess', "username" => $_SESSION['username'],'url'=>$queryAdd)));
} catch (PDOException $err) {
    die(json_encode($err->getMessage()));
}
