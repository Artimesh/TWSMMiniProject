// avoid cluttering
var chat = {}

chat.fetchMessages = function (){
    $.ajax({
        url: 'ajax/chat.php',
        type: 'post',
        data: { method: 'fetch' },
        success: function(data) {
            $('.chat .messages').html(data);
        }
    });
}

chat.throwMessage = function () {
    if ($.trim(message).length != 0) {
        $.ajax({
            url: 'ajax/chat.php',
            type: 'post',
            data: { method: 'throw', message: message },
            success: function(data) {
                chat.fetchMessages();
                chat.entry.val('');
            }
        });
    }
}

//selector for entry text area
chat.entry = $('.chat .entry');
chat.entry.bind('keydown', function(e) {
    // Enter has the keycode 13, so you submit text on enter
    if(e.keyCode === 13 && e.shiftKey === false) {
        chat.throwMessage($(this).val());
        e.preventDefault();
    }
});

chat.interval = setInterval(chat.fetchMessages, 5000);
chat.fetchMessages();