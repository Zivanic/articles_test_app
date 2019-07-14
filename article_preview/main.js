$(function () {
    getArticles();
});

function getArticles() {
    $.ajax({
        url: "./scripts/getArticles.php",
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            console.log(data);
            let url = window.location.protocol+"//"+ window.location.hostname;
           for(let i=0;i<data.length;i++){
               $('.article-list').append('<div class="article"><h1><a href="'+url+'/articles_test_app/single_article/article.php?id='+data[i].art_id+'">'+data[i].title+'</a></h1><a href="'+url+'/articles_test_app/single_article/article.php?id='+data[i].art_id+'"><img class="cover-img img-responsive" src="../'+data[i].cover_url+'"></img></a><p class="text-left"><span class="glyphicon glyphicon-user"></span>'+data[i].first_name+' '+data[i].last_name+'</p><p class="text-left">Article created: '+data[i].created_time+'</p></div>')
               
           }

        }, error: function (err) {
            console.log(err);

        }
    });
}
