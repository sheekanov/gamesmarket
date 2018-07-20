//отправка формы регистрации пользователя
(function(){
    $('#orderFormSubmit').on('click', function (e) {
        e.preventDefault();
        $('#orderMessage').html('Информация обрабатывается...');
        var data = $('#orderForm').serialize();

        $.ajax({
            url: '/cart/send',
            method: 'POST',
            dataType: 'html',
            data: data,
        }).done(function (response) {
            var jsoned = JSON.parse(response);
            if (jsoned.success) {
                $('#orderForm').addClass('modal__form--hidden');
                $('#orderFormSubmit').addClass('modal__form-submit-hidden');
                $('#orderMessage').removeClass('modals__message--error');
                $('#orderMessage').html(jsoned.message);
            } else {
                $('#orderMessage').addClass('modals__message--error')
                $('#orderMessage').html(jsoned.message);
            }
        })
    });

    $('.modals__cart-refresh').on('click', function (e) {
        e.preventDefault();
        document.location.href = '/cart';
    })
}());