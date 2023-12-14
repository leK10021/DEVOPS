<?php

require_once('src/models/homeModel.php');

function addUser($firstname, $lastname, $email, $password, $promo, $type, $confirmation, $keymail){
    $database = dbConnect();
    $statement = $database->prepare('INSERT INTO users(lastname, firstname, email, pwd,  promo, type, picture, confirmation, keymail) VALUES(:lastname, :firstname, :email, :pwd, :promo, :type, :picture , :confirmation, :keymail)');
    $affectedLines = $statement->execute(array(":lastname"=>$lastname, ":firstname"=>$firstname, ":pwd"=>$password, ":email"=>$email, ":promo"=>$promo, ":type"=>$type, ":picture"=>"profilBase.png", ":confirmation"=>$confirmation, ":keymail"=>$keymail));
    return ($affectedLines > 0);
}

function testMail($email){
    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->execute(array(":email"=>$email));
    $row = $statement->fetch();

    if($row > 0 ){
        return 1;
    }


    
}

function confirmation($email, $keymail){
    $database = dbConnect();
    $confirmation = 1;
    $statement = $database->prepare('UPDATE users SET confirmation = :confirmation WHERE email = :email and keymail = :keymail');
    $statement->execute(array(":confirmation"=>$confirmation, ":email"=>$email, ":keymail"=>$keymail));
}