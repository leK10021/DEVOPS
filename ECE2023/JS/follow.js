let id_friend = document.getElementById("id_friend");

let btnFollow = document.getElementById("btnFollow");


btnFollow.addEventListener('click', (event) =>{
    
    $.ajax({
      type: 'post',
      url: 'index.php?action=sendRequest',
      data: {
        id_friend:id_friend.value
      },success: function(response){
      console.log(response)          
      ;}
      
    });

});