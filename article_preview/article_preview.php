<?php
// core configuration
include_once "../core.php";
// set page title
$page_title = "Article preview";

// include login checker
$require_login = true;
include_once "../login_check.php";
?>
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
        <!-- admin custom CSS -->
        <link href="<?php echo $home_url . "css/style.css" ?>" rel="stylesheet" />
        <link href="style.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <?php
        // include page navigation HTML
        include_once '../navigation.php';
        ?>
        <main>
            <div class="container">
                <div class="article-wrapper">
                    <h3>The Latest Articles</h3>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                            <div class="article-list text-center clearfix">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="main.js" type="text/javascript"></script>
        <!-- end HTML page -->
    </body>
</html>