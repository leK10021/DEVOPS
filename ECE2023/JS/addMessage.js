
let text_message = document.getElementById("inputMessage");

let submit = document.getElementById("btnMessage");

let id_friend = document.getElementById("id_friend");

const containerConversation = document.querySelector('.containerConversation');
containerConversation.scrollTop = containerConversation.scrollHeight;


submit.addEventListener('click', (event) => {


    $.ajax({
        type: 'post',
        url: 'index.php?action=createMessage',
        data: {
            text_message: text_message.value,
            id_friend: id_friend.value

        },
        success: function (response) {
            $(".containerConversation").html(response);

        }
    });
    text_message.value = "";

    setTimeout(() => {
        containerConversation.scrollTop = containerConversation.scrollHeight;
      }, 100);

})

setInterval(() => {

    
    $.ajax({
        type: 'post',
        url: 'index.php?action=createMessage',
        data: {
            id_friend: id_friend.value
        },
        success: function (response) {
            $(".containerConversation").html(response);

        }
    });
}, 100);






























