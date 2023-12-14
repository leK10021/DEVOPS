<?php

function sessionStart(){
    session_start();
    $email = $_SESSION["email"]; 
    return $email;
}

function createComment($form){
    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    
    $name_commentator = $form['name_commentator'];
    $id_post = $form['id_post'];
    $picture_commentator = $form['picture_commentator'];
    $text_comment = $form['text_comment'];



    if (!preg_match('/^\s*$/', $text_comment) && $text_comment !='') {

        addComment($id_post, $name_commentator, $picture_commentator, $text_comment);

    
        $html = 
        '<div class="containerComment">
            <div class="containerTextComment">
                <img class="pictureComment" src="images/'.$picture_commentator.'" alt="">
                <div class="textComment">
                    '.$name_commentator.' :
                    '.$text_comment.'
                </div>
                
            </div>
            <span class="dateComment">à l\'instant</span>
        </div>';     

        echo $html;
    
    }  

    
    
}



