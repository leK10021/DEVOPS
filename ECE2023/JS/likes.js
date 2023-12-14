let likes = document.querySelectorAll(".like");

likes.forEach((like) => {

  let src = like.getAttribute('src');
  let srcInverse;
  let srcSwitch;


  if (src == "icon/likeIcon.png") {
    srcInverse = "icon/noLikeIcon.png";
  } else {
    srcInverse = "icon/likeIcon.png";
  }
  

  like.addEventListener('click', (event) => {
    srcSwitch = src;
    src = srcInverse;
    srcInverse = srcSwitch;
    like.setAttribute('src', src);
  });
});





function likeData(id_post)
{

  $.ajax({
  type: 'post',
  url: 'index.php?action=like',
  data: {
    id_post:id_post
  }
  });
    
  return false;

}
