    var from = null; //This is probably what needs to be changed to take information from the cookie storing the username 
    var start = 0; 
    var url = "http://localhost/chat_test2.php"; 


$(document).ready(function(){

    //alert("jquery ready"); 
   from = prompt("Please enter your name:"); //Asking for a username - replace/remove for final version
   //alert("Hello " + from); 
   load(); 

   $('form').submit(function(e){
        $.post(url, {
            Message: $("#Message").val(), 
            Sender : Sender 
        })
        $("#Message").val(''); 
        return false; 
   }); 
}); 

function load(){
    $.get(url + '?start=' + start, function(result){
        if(result.items){
            result.items.forEach(item =>{
                start = item.ID; 
                $('#Messages').append(renderMessage(item)); 
            }); 
            $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight}); 
        }; 
        load(); 
    });   
}

function renderMessage(item){
    //console.log(item);
    let time = new Date(item.created); 
    time = '${time.getHours()}:${time.getMinutes()};'
    return '<div class="msg"><p>$(item.from)</p>$(item.Message)<span>$time</span></div>';
}