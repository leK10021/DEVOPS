<?php

require_once('src/models/homeModel.php');

function getMessage($id_friend, $id_user){

    $infoFriend = return_infoUserWithId($id_friend);
    $database = dbConnect();

    $statement = $database->prepare('SELECT * FROM messages 
    WHERE (id_user = :id_user AND id_friend = :id_friend) 
       OR (id_user = :id_friend AND id_friend = :id_user)ORDER BY date_message ASC');
    $statement->execute(array(":id_friend"=>$id_friend, ":id_user"=>$id_user));
    $messages = [];


    while ($row = $statement->fetch()) {
        $message = [
            'id_friend'=>$row['id_friend'],
            'id_user'=>$row['id_user'],
            'text' => $row['text'],
            'date' => $row['date_message'],
            
        ];
        $messages[] = $message;
    }

    return $messages;

}

function addMessage($text_message, $id_friend, $id_user){
    $database = dbConnect();
    $statement = $database->prepare('INSERT INTO messages(id_user, id_friend, text, date_message) VALUE(:id_user, :id_friend, :text_message, NOW())');
    $statement->execute(array(":id_friend"=>$id_friend, ":id_user"=>$id_user, "text_message"=>$text_message));
}


