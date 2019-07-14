<header>
    <!-- navbar -->
    <div class="navbar navbar-default navbar-fixed-top " role="navigation">
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

                <?php
                // check if users / customer was logged in
                // if user was logged in, show "Logout" option
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    ?>

                    <ul class="nav navbar-nav">
                        <li <?php echo $page_title == "List of articles" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url; ?>">List articles</a>
                        </li>
                        <li <?php echo $page_title == "New article" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url . 'new_article/new_article.php'; ?>">New article</a>
                        </li>
                        <li <?php echo $page_title == "Update article" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url . 'update_article/update_article.php'; ?>">Update article</a>
                        </li>
                        <li <?php echo $page_title == "Article preview" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url . 'article_preview/article_preview.php'; ?>">Article preview</a>
                        </li>
                    </ul>
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
                            <a >
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
</header>
