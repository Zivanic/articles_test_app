<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- set the page title, for seo purposes too -->
        <title><?php echo isset($page_title) ? strip_tags($page_title) : ""; ?></title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />

        <!-- admin custom CSS -->
        <link href="<?php echo $home_url . "/css/style.css" ?>" rel="stylesheet" />

        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <!-- navbar -->
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">

                <div class="navbar-header">
                    <!-- to enable navigation dropdown when viewed in mobile device -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Change "Your Site" to your site name -->
                    <a class="navbar-brand" href="<?php echo $home_url; ?>">Article app</a>
                </div>

                <div class="navbar-collapse navbar-right collapse">
                    <ul class="nav navbar-nav">
                        <li <?php echo $page_title == "Index" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url; ?>">Create article</a>
                        </li>
                    </ul>

                    <?php
                    // check if users / customer was logged in
                    // if user was logged in, show "Logout" option
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo $home_url; ?>logout.php">Logout</a></li>
                        </ul>
                        <?php
                    }
                    // if user was not logged in, show the "login" options
                    else {
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li <?php echo $page_title == "Login" ? "class='active'" : ""; ?>>
                                <a href="<?php echo $home_url; ?>login">
                                    <span class="glyphicon glyphicon-log-in"></span> Log In
                                </a>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>

                </div><!--/.nav-collapse -->

            </div>
        </div>
        <!-- /navbar -->
