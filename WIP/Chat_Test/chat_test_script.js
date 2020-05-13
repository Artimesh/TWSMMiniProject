    var from = null; //This is probably what needs to be changed to take information from the cookie storing the username 
    var start = 0; 
    var url = "http://localhost/TWSMMiniProject/WIP/Chat_Test/get_chat_messages.php";
    var chat = "http://localhost/TWSMMiniProject/WIP/Chat_Test/chat_to_save.php";



$(document).ready(function(){

    //from = prompt("Please enter your name:"); //Asking for a username - replace/remove for final version
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