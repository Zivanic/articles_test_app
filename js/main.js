$(function () {

    $('#username, #password').keyup(function () {
        $('#username, #password').css('border-color', '#c5c5c5');
        $('.username-err-msg, .password-err-msg').empty();
    });

    $('#submitButton').click(function (e) {
        e.preventDefault();
        validateForm();

    })
});

function validateForm() {
    $('#username, #password').css('border-color', '#c5c5c5');
    $('.username-err-msg, .password-err-msg').empty();
    
    let username = $('#username').val();
    let password = $('#password').val();
    if (username == '') {
        $('#username').css('border-color', 'red');
        $('.username-err-msg').append('Please insert your username');
        false;
    }
    if (password == '') {
        $('#password').css('border-color', 'red');
        $('.password-err-msg').append('Please insert your password');
        false;
    }

    if (username != '' && password != '') {

        $.ajax({
            url: "./login.php",
            type: 'POST',
            dataType: 'JSON',
            data: {username: username, pass: password},
            success: function (data) {
                console.log(data);
                if (data == 'incorrect username') {
                    $('#username').css('border-color', 'red');
                    $('.username-err-msg').append('Username does not existe');
                }

                if (data == 'incorrect password') {
                    $('#password').css('border-color', 'red');
                    $('.password-err-msg').append('Incorrect password');
                }
                
                if (data == 'login succsess') {
                    window.location.replace("http://localhost/articles_test_app/index.php");
                }
                
                
            }, error: function (err) {
                console.log(err);
                
            }
        });
    }
}