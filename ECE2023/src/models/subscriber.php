<?php
require_once('src/models/homeModel.php');

function getSubscriber_requests($email){
    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare('SELECT * FROM subscribers WHERE id_user = :id_user AND confirmation = 0');
    $statement->execute(array(":id_user"=>$infoUser['id_user']));
    $subscriber_requests = [];

    while (($row = $statement->fetch())) {
        $subscriber_request = [
            'id_subscription' => $row['id_subscription'],
            'id_user' => $row['id_user'],
            'id_friend' => $row['id_friend'],
            'name_friend' => $row['name_friend'],
            'picture_friend' => $row['picture_friend']
        ];
        $subscriber_requests[] = $subscriber_request;

    }

    return $subscriber_requests;
}

function getUser_subscribers($email){

    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $id_user = $infoUser["id_user"];
    $statement = $database->prepare('SELECT * FROM subscribers WHERE id_user = :id_user AND confirmation = 1');
    $statement->execute(array(":id_user"=>$id_user));
    $user_subscribers = [];

    while (($row = $statement->fetch())) {
        $user_subscriber = [
            'id_subscription' => $row['id_subscription'],
            'id_user' => $row['id_user'],
            'id_friend' => $row['id_friend'],
            'name_friend' => $row['name_friend'],
            'picture_friend' => $row['picture_friend']
        ];
        $user_subscribers[] = $user_subscriber;

    }

    return $user_subscribers;
}


function confirmSubscribe($id_user, $id_friend, $picture_friend, $name_friend){
    $database = dbConnect();
    $statement = $database->prepare('UPDATE subscribers SET confirmation = 1 WHERE id_friend = :id_friend AND id_user = :id_user');
    $statement->execute(array(":id_user"=>$id_user, ":id_friend"=>$id_friend));

    $statement1 = $database->prepare('INSERT INTO subscribers(id_friend, id_user, name_friend, picture_friend, confirmation) VALUE(:id_friend, :id_user, :name_friend, :picture_friend, 1)');
    $statement1->execute(array(":id_user"=>$id_friend, ":id_friend"=>$id_user, ":name_friend"=>$name_friend, ":picture_friend"=>$picture_friend));

}      


function deleteSubscribe($id_user, $id_friend){
    $database = dbConnect();
    $statement = $database->prepare('DELETE FROM subscribers WHERE id_friend = :id_user AND id_user = :id_friend');
    $statement->execute(array(":id_user"=>$id_user, ":id_friend"=>$id_friend));
}

function addSubscriber_request($id_user,$id_friend,$name_friend,$picture_friend,$confirmation){
    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM subscribers WHERE id_user = :id_friend AND id_friend = :id_user');
$statement->execute(array(":id_user"=>$id_user, ":id_friend"=>$id_friend));

if($statement->rowCount() == 0) {
    $statement = $database->prepare('INSERT INTO subscribers(id_user, id_friend, name_friend, picture_friend, confirmation) VALUES(:id_user, :id_friend, :name_friend, :picture_friend, :confirmation)');
    $statement->execute(array(":id_user"=>$id_friend, ":id_friend"=>$id_user, ":name_friend"=>$name_friend, ":picture_friend"=>$picture_friend, ":confirmation"=>$confirmation));
}
}

function testSub($id_userAccount, $email){
    $database = dbConnect();
    $infoUser = return_infoUser($email);

    $statement = $database->prepare('SELECT * FROM subscribers where (id_user = :id_userAccount AND id_friend = :id_user) OR (id_user = :id_user AND id_friend = :id_userAccount)');
    $statement->execute(array(":id_userAccount"=>$id_userAccount, ":id_user"=>$infoUser["id_user"]));
    $row_count = $statement->rowCount();

    return $row_count;
}

