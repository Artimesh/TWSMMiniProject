var from = null; 
var start = 0; 
var chat = "http://localhost/TWSMMiniProject/WIP/Chat_Page/chat_to_save.php";

$(document).ready(function(){
    load();
    $('form').submit(function(e){
        $.post(chat, {
            message: $('#message').val(), 
            from: from 
        });
        $('#message').val(''); 
        return false; 
   });
}); 

function load(){
    console.log("Hello");
    $.get(chat + '?start=' + start, function(result){
        if(result.items){
            result.items.forEach(item =>{
                start = item.ID; 
                $('#messages').append(renderMessage(item)); 
            })
            $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight}); 
        }; 
        load(); 
    });
}

function renderMessage(item){
    //console.log(item);
    let time = new Date(item.created); 
    time = `${time.getHours()}:${time.getMinutes()};`
    return `<div class="msg"><p>${item.from}</p>${item.Message}<span>$time</span></div>`;
}