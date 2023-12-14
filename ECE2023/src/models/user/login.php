<?php

require_once('src/models/homeModel.php');



function verifLogin($email, $password){
    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM users WHERE email = :email AND pwd = :pwd AND confirmation = 1');
    $statement1 = $database->prepare('SELECT * FROM users WHERE email = :email AND pwd = :pwd AND confirmation = 0');
    $statement->execute(array(":email"=>$email, ":pwd"=>$password));
    $statement1->execute(array(":email"=>$email, ":pwd"=>$password));

    $row = $statement->fetch();
    $row1 = $statement1->fetch();

    if($row > 0){
        return 1;
    }elseif($row1 > 0){
        return 2;
    }else{
        return $password;
    }
}