//Vezano za paginaciju i koliko ih ima na strani
let curPage = 1;
let curPageOld = 1;
let numberOnPage = 1;
let itemsPagination = 10;



$(function () {
    $(function () {
        $('#pagination').pagination({
            items: numberOnPage,
            itemsOnPage: itemsPagination,
            cssStyle: 'light-theme',
            onPageClick: function (pageNumber) {
                curPageOld = curPage;
                curPage = pageNumber;
                getArticles();
            }
        });
    });
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
        data:{filter:filter,curPage:curPage},
        success: function (data) {
            console.log(data);
            let art = data.res;
            $('.article-box').empty();
            for(let i=0;i<art.length;i++){
               $('.article-box').append('<div class="row art-wrapper"><div class="col-sm-6 col-md-1"><p>'+(i+1+(curPage-1)*itemsPagination)+'</p></div><div class="col-sm-6 col-md-6"><span>Title:</span><p>'+art[i].title+'</p></div><div class="col-sm-6 col-md-2"><span>Created by: </span><p>'+art[i].first_name+' '+art[i].last_name +'</p></div><div class="col-sm-6 col-md-2"><span>Created time:</span><p>'+art[i].created_time+'</p></div></div>')
            }
            
            numberOnPage = data['rowCount']['rowCount'];
//        console.log(numberOnPage);
        $(function () {
            $("#pagination").pagination('updateItems', numberOnPage);

        });
       
        
           
        }, error: function (err) {
            console.log(err);

        }
    });
}