<?php

// core configuration
include_once "core.php";
// set page title
$page_title = "Login";
// default to false
$access_denied = false;
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- set the page title, for seo purposes too -->
        <title><?php echo isset($page_title) ? strip_tags($page_title) : ""; ?></title>
        <!--font-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        
        <link href="<?php echo $home_url . "js/main.js" ?>" rel="stylesheet" />
        <!-- admin custom CSS -->
        <link href="<?php echo $home_url . "css/style.css" ?>" rel="stylesheet" />

    </head>
    <body>
        <?php
        // include page navigation HTML
        include_once 'navigation.php';
        ?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                        <div class="row">
                            <form id="formLogin"  action="login.php" method="post">
                                <h2 class="text-center">Welcome back</h2>

                                <div class="col-sm-6 col-sm-offset-3">     
                                    <input required type="text" class="form-control" id="username" placeholder="USERNAME" name="username">
                                    <p class="username-err-msg"></p>
                                </div>
                                <div class="col-sm-6 col-sm-offset-3">          
                                    <input required type="password" class="form-control" id="password" placeholder="PASSWORD" name="password">
                                    <p class="password-err-msg"></p>
                                </div>
                                <div class="col-sm-6 col-sm-offset-3">   
                                    <button type="submit" id="submitButton" class="btn btn-defaul">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="js/main.js" type="text/javascript"></script>
        <!-- end HTML page -->
    </body>
</html>