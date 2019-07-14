$(function () {
    $('.alert').hide();
    tinymce.init({
        selector: '#articleArea', // change this value according to your HTML
        plugins: 'link, image',
        a_plugin_option: true,
        a_configuration_option: 400,
        menubar: true,
        // without images_upload_url set, Upload tab won't show up
        images_upload_url: 'upload.php',

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
                console.log(xhr.responseText);
                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }
                console.log(json);
                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
    });


})

function createArticle() {
    let title = $('#title').val();
    let text = tinyMCE.get('articleArea').getContent();
    let file = $("#cover").prop("files")[0];

    if (title == '') {
        $('.title_err').text('Please create title');
        $('#title').css('border-color', 'red');
        return;
    }
    if (text == '') {
        $('.text_err').text('Please create title');
        $('.tox-tinymce').css('border-color', 'red');
        return;
    }
    if (text == '') {
        $('.cover_err').text('Please select cover image');
        return;
    }

    var form_data = new FormData();
    form_data.append("file", file);
    form_data.append("title", title);
    form_data.append("text", text);

    $.ajax({
        url: "./scripts/createArticle.php",
        type: 'POST',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function (data) {
            console.log(data);
            if (data.message == 'error') {
                $('#cover').val('');
                $(".cover_err").text(data.error);
                
            } else {
                tinyMCE.get('articleArea').resetContent();
                $('#title').val('');
                $('#cover').val('');
                $(".info_message").append(data.username + ", your article is created");
                $('.alert').show();
            }

        }, error: function (err) {
            console.log(err);

        }
    });

}