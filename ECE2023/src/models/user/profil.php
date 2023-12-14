<?php

require_once('src/models/homeModel.php');



function updateProfil($street,$city,$zip,$promo,$description,$email,$birthday){
    $database = dbConnect();
    $statement = $database->prepare('UPDATE users SET city = :city, street = :street, zip = :zip, promo = :promo, description = :description, birthday = :birthday   WHERE email = :email');
    $statement->execute(array(":city"=>$city, ":street"=>$street, ":zip"=>$zip, ":promo"=>$promo, ":description"=>$description, ":email"=>$email,  ":birthday"=>$birthday));

    header('Location: index.php?action=profilPage');
}

function updatePicture($filename,$email){
    $database = dbConnect();
    $statement = $database->prepare('UPDATE users SET picture = :picture WHERE email = :email');
    $statement->execute(array(":email"=>$email, ":picture"=>$filename));
    header('Location: index.php?action=profilPage');
}



function updatePwd($pwd,$email){
    $database = dbConnect();
    $statement = $database->prepare('UPDATE users SET pwd = :pwd WHERE email = :email');
    $statement->execute(array(":email"=>$email, ":pwd"=>$pwd));
    header('Location: index.php?action=profilPage');
}