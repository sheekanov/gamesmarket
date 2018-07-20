//отправка формы регистрации пользователя
(function(){
    $('#registerSubmit').on('click', function (e) {
        e.preventDefault();

        var data = $('#registerForm').serialize();

        $.ajax({
            url: '/login/create',
            method: 'POST',
            dataType: 'html',
            data: data,
        }).done(function (response) {
            var jsoned = JSON.parse(response);
            if (jsoned.success) {
                document.location.href = '/profile';
            } else {
                $('#registerNameError').html(jsoned.message);
            }
        })
    })
}());