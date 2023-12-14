<?php

require_once('src/controllers/homeController.php');
require_once('src/models/subscriber.php');
require_once('src/models/message.php');


function messagePage(){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    
    $user_subscribers = getUser_subscribers($email);

    require("templates/messagePage.php");

}

function conversationForm($id_friend){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $infoFriend = return_infoUserWithId($id_friend);
    $infoUser = return_infoUser($email);
    $id_user = $infoUser["id_user"];
    $messages = getMessage($id_friend, $id_user);


    require("templates/conversationForm.php");

}


function createMessage($form){


    $email = sessionStart();


    
    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $infoUser = return_infoUser($email);
    $id_user = $infoUser["id_user"];
    $id_friend = $form['id_friend'];

    if(!isset($form['text_message'])){
        $text_message = "";
    }else{
        $text_message = $form['text_message'];

    }
  

    if (!preg_match('/^\s*$/', $text_message) && $text_message !='') {

        addMessage($text_message, $id_friend, $id_user);
    
    }  

    $messages = getMessage($id_friend, $id_user);

    
    $html = '';


    foreach($messages as $message){

        if($message["id_user"] == $id_user){
            $html .=  '<div class="containerMessage"><div class="containerMessageRight"> '.$message["text"].' </div></div>';
        }else{
            $html .=  '<div class="containerMessage"><div class="containerMessageLeft"> '.$message["text"].' </div></div>';
        }
            
    }    

    echo $html;
}