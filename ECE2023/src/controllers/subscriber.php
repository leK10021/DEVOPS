<?php

require_once('src/controllers/homeController.php');
require_once('src/models/subscriber.php');


function notificationPage(){
    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    
    $subscriber_requests = getSubscriber_requests($email);
    require("templates/notificationPage.php");
}

function acceptSubscribe($id_friend){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $infoUser = return_infoUser($email);
    $infoUserId = return_infoUserWithId($id_friend);

    $id_user = $infoUser["id_user"];
    $picture_friend = $infoUserId["picture"];
    $name_friend = $infoUser["lastname"] . ' ' . $infoUser["firstname"];
    


    confirmSubscribe($id_user, $id_friend, $picture_friend, $name_friend);
    header("location:index.php?action=notificationPage");



}

function refuseSubscribe($id_user){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $infoUser = return_infoUser($email);
    $id_friend = $infoUser["id_user"];
    
    deleteSubscribe($id_user, $id_friend);
    header("location:index.php?action=notificationPage");



}




function sendRequest($form){

    $email = sessionStart();

    header("location=index.php?action=loginForm");


    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $infoUser = return_infoUser($email);
    $id_user = $infoUser["id_user"];


    

    $id_friend = $form['id_friend'];
    $name_friend = $infoUser['lastname'].' '.$infoUser["firstname"];
    $picture_friend = $infoUser['picture'];
    $confirmation = 0;
    addSubscriber_request($id_user,$id_friend,$name_friend,$picture_friend,$confirmation);

}

