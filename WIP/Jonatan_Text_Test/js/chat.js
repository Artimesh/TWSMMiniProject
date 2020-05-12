// avoid cluttering
var chat = {}

chat.fetchMessages = function (){
    $.ajax({
        url: 'ajax/chat.php',
        type: 'post',
        data: { method: 'fetch' },
        success: function() {
            $('.chat .messages').html(data);
        }
    });
}

chat.interval = setInterval(chat.fetchMessages, 5000);