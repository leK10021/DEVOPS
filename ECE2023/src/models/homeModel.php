<?php

function dbConnect()
{
    try {
        $database = new PDO('mysql:host=localhost;dbname=ecebook', 'root', '');

        return $database;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function return_infoUser($email){

    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->execute(array(":email"=>$email));
    $row = $statement->fetch();

    $statement2 = $database->prepare('SELECT COUNT(*) FROM subscribers WHERE id_user = :id_user AND confirmation = 1');
    $statement2->execute(array(":id_user"=>$row['id_user']));
    $nb_friend = $statement2->fetchColumn();

    $statement3 = $database->prepare('SELECT COUNT(*) FROM posts WHERE id_user = :id_user');
    $statement3->execute(array(":id_user"=>$row['id_user']));
    $nb_posts = $statement3->fetchColumn();
    
    $infoUser = [
        'lastname' => $row['lastname'],
        'firstname' => $row['firstname'],
        'id_user' => $row['id_user'],
        'email' => $row['email'],

        'type' => $row['type'],
        'promo' => $row['promo'],
        'birthday' => $row['birthday'],
        'description' => $row['description'],
        'city' => $row['city'],
        'zip' => $row['zip'],
        'street' => $row['street'],
        'picture' => $row['picture'],
        'nb_friend' => $nb_friend,
        'nb_posts' => $nb_posts
    ];

    return $infoUser;

}

function return_infoUserWithId($id_user){

    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM users WHERE id_user = :id_user');
    $statement->execute(array(":id_user"=>$id_user));
    $row = $statement->fetch();

    $statement2 = $database->prepare('SELECT COUNT(*) FROM subscribers WHERE id_user = :id_user AND confirmation = 1' );
    $statement2->execute(array(":id_user"=>$row['id_user']));
    $nb_friend = $statement2->fetchColumn();

    $statement3 = $database->prepare('SELECT COUNT(*) FROM posts WHERE id_user = :id_user');
    $statement3->execute(array(":id_user"=>$row['id_user']));
    $nb_posts = $statement3->fetchColumn();
    
    $infoUser = [
        'lastname' => $row['lastname'],
        'firstname' => $row['firstname'],
        'email' => $row['email'],

        'id_user' => $row['id_user'],
        'type' => $row['type'],
        'promo' => $row['promo'],
        'birthday' => $row['birthday'],
        'description' => $row['description'],
        'city' => $row['city'],
        'zip' => $row['zip'],
        'street' => $row['street'],
        'picture' => $row['picture'],
        'nb_friend' => $nb_friend,
        'nb_posts' => $nb_posts
    ];

    return $infoUser;

}

function getPopularAccounts(){

    $database = dbConnect();
    $statement = $database->prepare('SELECT users.*, COUNT(subscribers.id_friend) AS followers_count FROM users LEFT JOIN subscribers ON users.id_user = subscribers.id_friend GROUP BY users.id_user ORDER BY followers_count DESC');
    $statement->execute();
    $popular_accounts = [];

    while ($row = $statement->fetch()) {
        $popular_account = [
            'lastname' => $row['lastname'],
            'firstname' => $row['firstname'],
            'id_user' => $row['id_user'],
            'type' => $row['type'],
            'promo' => $row['promo'],
            'birthday' => $row['birthday'],
            'description' => $row['description'],
            'city' => $row['city'],
            'zip' => $row['zip'],
            'street' => $row['street'],
            'picture' => $row['picture'],
        ];
        $popular_accounts[] = $popular_account;
    }

    return $popular_accounts;
    
}


