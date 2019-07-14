<?php
// core configuration
include_once "../core.php";
// set page title
$page_title = "New article";

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
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    </head>
    <body>
        <?php
        // include page navigation HTML
        include_once '../navigation.php';
        ?>
        <main>
            <div class="container">
                <div hidden class="alert alert-success fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-ok"></span><span class="info_message"></span>
                    
                </div>
                <h1>Create new post</h1>
                <div class="form-groupe">
                    <label for="title">Add article title:</label>
                    <input type="text" name="title" id="title">
                    <p class="title_err err_info"></p>
                </div>
                <div class="form-groupe">
                    <label for="cover">Add article cover image:</label>
                    <input type="file" name="cover" id="cover">
                    <p class="cover_err err_info"></p>
                </div>
                <div class="form-groupe">
                    <label for="article_text">Add article text:</label>
                    <textarea id="articleArea" name="article_text"></textarea>
                    <p class="text_err err_info"></p>
                </div>
                <button class="btn btn-block btn-success" onclick="createArticle()">Create</button>
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