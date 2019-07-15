<?php
// if $require_login was set and value is 'true'
 if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['logged_in']) && $_SESSION['logged_in']!==true){
        header("Location: {$home_url}access.php?action=please_login");
    }
}
 
// if it was the 'login' page but the user was already logged in
else if(isset($page_title) && $page_title=="Login"){
   
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
        header("Location: {$home_url}index.php?action=already_logged_in");
    }
}

?>