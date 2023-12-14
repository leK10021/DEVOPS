<?php
require_once('src/controllers/homeController.php');
require_once('src/models/homeModel.php');
require_once('src/models/post.php');
require_once('src/models/comment.php');

function homePage(){
    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    
    $infoUser = return_infoUser($email);
    $posts_subscribers = getPosts_subscribers($email);
    require("templates/homePage.php");
}


