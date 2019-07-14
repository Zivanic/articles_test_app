<?php
// core configuration
include_once "../core.php";
// set page title
$page_title = "Update article";

// include login checker
$require_login = true;
include_once "../login_check.php";
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
                <div class="row">
                   
                    <h1>Edit/delete your article</h1>
                    <div class="article-holder">

                    </div>
                </div>

            </div>
            <!-- Delete Modal -->
            <div id="del-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Do you want to delete this article ?</h4>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="deleteArticle" type="button" class="btn btn-default" >Delete</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Edit Modal -->
            <div id="edit-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit article</h4>
                        </div>
                        <div class="modal-body">
                            
                            <div class="form-groupe">
                                <label for="title">Edit article title:</label>
                                <input type="text" name="title" id="editTitle">
                                <p class="edit_title_err err_info"></p>
                            </div>
                            <div class="form-groupe">
                                <label for="article_text">Edit article text:</label>
                                <textarea id="editArticleArea" name="article_text"></textarea>
                                <p class="edit_text_err err_info"></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="editArticle" type="button" class="btn btn-default" >Save</button>
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