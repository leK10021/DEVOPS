<?php
require_once('src/controllers/homeController.php');
require_once('src/models/post.php');

function likePost($form){
    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }    
    
    $id_post = $form['id_post'];
    addLike($id_post, $email);
}

function favoriPost($form){
    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    
    $id_post = $form['id_post'];
    addFavori($id_post, $email);
}

function createPostForm() {
    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    
    require("templates/createPostForm.php");
}

function createPost($form,$form2){
    if (!empty($form2['picture']) && !empty($form['text'])){
    $email = sessionStart();

        if(empty($email)){
        header('Location: index.php?action=loginForm');
        }
        
        $target_file = "images/" . basename($_FILES["picture"]["name"]);
        $move = move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        if($move){
        $picture_post = basename($_FILES["picture"]["name"]);
        $text = $form['text'];
        $infoUser = return_infoUser($email);
        $id_user = $infoUser['id_user'];
        $name = $infoUser['firstname']." ".$infoUser['lastname'];
        $picture_user = $infoUser['picture'];
        addPost($picture_post, $text, $id_user, $name, $picture_user);
        }else{
        echo "La photo n'a pas été rechargée";
    }
    }else{
    echo 'Veuillez remplir les champs';
    }
}