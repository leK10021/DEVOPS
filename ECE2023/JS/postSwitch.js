let containerAllPostFull = document.querySelectorAll(".containerAllPostFull");
let seeComments = document.querySelectorAll(".seeComment");
let vueComments = document.querySelectorAll(".seeComment_2");

let closeBTN = document.querySelectorAll(".close");
seeComments.forEach((seeComment, key) => {
    seeComment.addEventListener('click', (event) =>{
        containerAllPostFull[key].style.opacity = 1;
        containerAllPostFull[key].style.zIndex = 4;
    })

    closeBTN[key].addEventListener('click', (event) =>{
        containerAllPostFull[key].style.opacity = 0;
        containerAllPostFull[key].style.zIndex = -1;
    })
})

vueComments.forEach((vueComment, key) => {
    vueComment.addEventListener('click', (event) =>{
        containerAllPostFull[key].style.opacity = 1;
        containerAllPostFull[key].style.zIndex = 4;
    })

    closeBTN[key].addEventListener('click', (event) =>{
        containerAllPostFull[key].style.opacity = 0;
        containerAllPostFull[key].style.zIndex = -1;
    })
})