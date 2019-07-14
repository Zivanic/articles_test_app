$(function () {
    getArticle();
})

function getArticle() {
    let params = new URLSearchParams(document.location.search.substring(1));
    let art_id = parseInt(params.get("id")); 
    
    $.ajax({
        url: "./getArticle.php",
        type: 'POST',
        dataType: 'JSON',
        data:{id:art_id},
        success: function (data) {
            console.log(data);
            $('.cover').css('background-image', 'url(../'+data.cover_url+')');
            $('.article').html(data.text);

        }, error: function (err) {
            console.log(err);

        }
    });
}