<?php

include_once "db_info.php";
//include_once "core.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

$username = $_POST['username'];
$pass = md5($_POST['pass']);
$message = '';

// check if user exists
$user_exists = FALSE;

try {
    $sqlUser = 'SELECT * FROM users WHERE users.username=:username ';
    $queryUser = $db->prepare($sqlUser);
    $queryUser->bindParam(':username', $username);
    $queryUser->execute();
    $resUser = $queryUser->fetch(PDO::FETCH_ASSOC);


    if ($resUser) {
        $user_exists = TRUE;
    } else {
        $user_exists = FALSE;
        $message = 'incorrect username';
        die(json_encode($message));
    }
} catch (PDOException $e) {

    die(json_encode($e->getMessage()));
}

// login validation will be here
try {
    if ($user_exists) {
        if ($resUser['password'] == $pass) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $resUser['id'];
            $_SESSION['firstname'] = $resUser['first_name'];
            $_SESSION['lastname'] = $resUser['last_name'];
            $_SESSION['username'] = $resUser['username'];
            
            $message = 'login succsess';
            die(json_encode($message));
//           
        } else {
            $message = 'incorrect password';
            die(json_encode($message));
        }
    } else {
        $message = 'incorrect username';
        die(json_encode($message));
    }
} catch (PDOException $err) {

    die(json_encode($err->getMessage()));
}
?>