let favoris = document.querySelectorAll(".favori");

favoris.forEach((favori) => {
  let src = favori.getAttribute('src');
  let srcInverse;
  let srcSwitch;


  if (src == "icon/favoriIcon.png") {
    srcInverse = "icon/noFavoriIcon.png";
  } else {
    srcInverse = "icon/favoriIcon.png";
  }

  favori.addEventListener('click', (event) => {
    srcSwitch = src;
    src = srcInverse;
    srcInverse = srcSwitch;
    favori.setAttribute('src', src);
  });
});





function favoriData(id_post)
{

    $.ajax({
    type: 'post',
    url: 'index.php?action=favori',
    data: {
      id_post:id_post
    }
   
  });
    
  return false;

}
