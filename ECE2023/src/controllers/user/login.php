<?php

require_once('src/models/user/login.php');


function login($form){

    $color = "red";

    if(!empty($form["email"]) && !empty($form["password"])){
        $email = $form["email"];
        $password = md5($form["password"]);

        if(verifLogin($email, $password) == 1){

            session_start();
            $_SESSION["email"] = $email; 

            header('Location: index.php?action=homePage');
            
        }elseif(verifLogin($email, $password) == 2){
            $error = "Votre compte est en attente d'activation";
            loginForm($error, $color);
        }else{
            $error = "Erreur d'Authentification" ;
            loginForm($error, $color);
        }

    }elseif(empty($email) || empty($password)){
        $error = "Veuillez remplir les champs";
        loginForm($error, $color);
    }
}

function loginForm($error, $color){
    require("templates/loginForm.php");
}