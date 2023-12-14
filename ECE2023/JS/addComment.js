
  let name_commentator = document.querySelectorAll(".name_commentator");
  let picture_commentator = document.querySelectorAll(".picture_commentator");
  let id_post = document.querySelectorAll(".id_post");
  let text_comment = document.querySelectorAll(".text_comment");
  let submits = document.querySelectorAll(".sendBtn");

  submits.forEach((submit, key) => {
    submit.addEventListener('click', (event) =>{
    
      $.ajax({
        type: 'post',
        url: 'index.php?action=createComment',
        data: {
          name_commentator:name_commentator[key].value,
          picture_commentator:picture_commentator[key].value,
          id_post:id_post[key].value,
          text_comment:text_comment[key].value,

        },
        success: function(response){
          $(".containerComments_" + id_post[key].value).each(function() {
            $(this).prepend(response);
          });}
      });
      text_comment[key].value="";

    })
  
  })

  
  let name_commentator_2 = document.querySelectorAll(".name_commentator_2");
  let picture_commentator_2 = document.querySelectorAll(".picture_commentator_2");
  let id_post_2 = document.querySelectorAll(".id_post_2");
  let text_comment_2 = document.querySelectorAll(".text_comment_2");
  let submits_2 = document.querySelectorAll(".sendBtn_2");

  submits_2.forEach((submit_2, key) => {
    submit_2.addEventListener('click', (event) =>{
      $.ajax({
        type: 'post',
        url: 'index.php?action=createComment',
        data: {
          name_commentator:name_commentator_2[key].value,
          picture_commentator:picture_commentator_2[key].value,
          id_post:id_post_2[key].value,
          text_comment:text_comment_2[key].value,

        },
        success: function(response){
          $(".containerComments_" + id_post_2[key].value).each(function() {
            $(this).prepend(response);
            
          });}
      });
      text_comment_2[key].value="";

    })
  
  })


  











  
    



  











    
