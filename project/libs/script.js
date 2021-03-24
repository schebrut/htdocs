$(document).ready(function () {

    setInterval(function () {
        getMessages();
        getUsers();
    }, 500);

    function setMessage() {
        message = $('.msg-text').val();
        message = $.trim( message );
        if (message !== ''){
            $.ajax({
                url: 'messages',
                method: 'post',
                dataType: 'html',
                data: {
                    message: message,
                },
            });
        $('.msg-text').val('');
    }
    }

    function getUsers() {
        $.ajax({
            url: 'userslist',
            method: 'post',
            success: function (data) {
                if (data){
                $('.chat-users').html(data);
                }else{
                    $('.chat-users').html('Ошибка вывода пользователей');
                }
            }
        });
    }

    function getMessages() {
        $.ajax({
            url: 'getmessages',
            method: 'post',
            success: function (data) {
                if(data){
                $('.table_msg').html(data);
                }else{
                    $('.table_msg').html('Ошибка вывода сообщений')
                }
            }
        });
    }
    $('.send-message').click(function () {
        setMessage();
        $('.messages-window').scrollTop(10000000);
    })
});