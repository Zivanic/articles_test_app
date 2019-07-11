$(function () {
    getAllUsers();
    getArticles();
});
function getAllUsers() {

    $.ajax({
        url: "./scripts/getUsers.php",
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
//            console.log(data);
            
            for(let i=0;i<data.length;i++){
                $('#filter').append('<option value='+data[i].id + '>'+data[i].username+'</option>');
            }
            
           
        }, error: function (err) {
            console.log(err);

        }
    });
}
function getArticles() {
    let filter = $('#filter').val();
    
    $.ajax({
        url: "./scripts/getArticles.php",
        type: 'POST',
        dataType: 'JSON',
        data:{filter:filter},
        success: function (data) {
            console.log(data);
            $('.article-box').empty();
            for(let i=0;i<data.length;i++){
               $('.article-box').append('<div class="col-sm-6 col-md-1"><p>'+(i+1)+'</p></div><div class="col-sm-6 col-md-5"><span>Title:</span><p>'+data[i].title+'</p></div><div class="col-sm-6 col-md-3"><span>Created by: </span><p>'+data[i].first_name+' '+data[i].last_name +'</p></div><div class="col-sm-6 col-md-3"><span>Created time:</span><p>'+data[i].created_time+'</p></div>')
            }
            
           
        }, error: function (err) {
            console.log(err);

        }
    });
}