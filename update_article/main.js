$(function () {
    getArticles();
    $('#deleteArticle').click(function () {
        let art_id = $(this).attr('data-id');
        deleteArticle(art_id);
    });
    $('#editArticle').click(function () {
        let art_id = $(this).attr('data-id');
        editArticle(art_id);
    });
    tinymce.init({
        selector: '#editArticleArea', // change this value according to your HTML
        plugins: 'link, image',
        a_plugin_option: true,
        a_configuration_option: 400,
        menubar: true,
        // without images_upload_url set, Upload tab won't show up
        images_upload_url: '../upload.php',

        // override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '../upload.php');

            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
    });
});

function getArticles() {
    $.ajax({
        url: "./scripts/getArticles.php",
        type: 'POST',
        dataType: 'JSON',
        data:{filter:'all'},
        success: function (data) {
            console.log(data);
            $('.article-holder').empty();
            for (let i = 0; i < data.length; i++) {
                $('.article-holder').append('<span class="article-update clearfix" id=art_' + data[i].art_id + '>Title: ' + data[i].title + '<button onclick="deleteModal(' + data[i].art_id + ')" class="btn btn-danger pull-right">Delete</button><button data-toggle="collapse" data-target="#article' + data[i].art_id + '" onclick="editModal(' + data[i].art_id + ')" class="btn btn-info pull-right">Edit</button></span>');
            }

        }, error: function (err) {
            console.log(err);

        }
    });
}

function deleteModal(id) {
    $('#del-modal').modal('show');
    $('#deleteArticle').attr('data-id', id);
}
function deleteArticle(id) {
    $.ajax({
        url: "./scripts/deleteArticle.php",
        type: 'POST',
        dataType: 'JSON',
        data: {id: id},
        success: function (data) {
//            console.log(data);
            $('#del-modal').modal('hide');
            $('#art_' + id).hide();
            $('.edit_info_message').empty();
            $('.edit_info_message').append('Succsessuful deleted article');
            $('.alert').show();
        }, error: function (err) {
            console.log(err);

        }
    });
}

function editModal(id) {
    $('#edit-modal').modal('show');
    $('#editArticle').attr('data-id', id);
    $.ajax({
        url: "./scripts/getArticles.php",
        type: 'POST',
        dataType: 'JSON',
        data: {filter: id},
        success: function (data) {
            console.log(data);
           tinyMCE.get('editArticleArea').setContent('');
           $('#editTitle').val(data[0].title);
           tinyMCE.get('editArticleArea').setContent(data[0].text);
           
        }, error: function (err) {
            console.log(err);

        }
    });
}
function editArticle(id) {
    let title = $('#editTitle').val();
    let text = tinyMCE.get('editArticleArea').getContent();

    if (title == '') {
        $('.edit_title_err').text('Please create title');
        $('#editTitle').css('border-color', 'red');
        return;
    }
    if (text == '') {
        $('.edit_text_err').text('Please create title');
        $('.tox-tinymce').css('border-color', 'red');
        return;
    }

    $.ajax({
        url: "./scripts/editArticle.php",
        type: 'POST',
        dataType: 'JSON',
        data: {id:id, title: title, text: text},
        success: function (data) {
//                console.log(data);
            tinyMCE.get('editArticleArea').resetContent();
            $('#title').val('');
            $(".info_message").append(data.username + ", your article is created");
            $('#edit-modal').modal('hide');
            $('.edit_info_message').empty();
            $('.edit_info_message').append('Succsessuful edited article');
            $('.alert').show();
            getArticles();
        }, error: function (err) {
            console.log(err);

        }
    });

}