<?php
require_once('src/models/homeModel.php');

function accountsSearched($text_search){
    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM users WHERE lastname LIKE :text_search OR firstname LIKE :text_search');
    $statement->execute(array(':text_search' => $text_search.'%'));
    $searched_accounts = [];

    while ($row = $statement->fetch()) {
        $searched_account = [
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
        $searched_accounts[] = $searched_account;
    }

    return $searched_accounts;
}