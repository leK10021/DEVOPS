<?php

require_once('src/models/homeModel.php');


function addComment($id_post, $name_commentator, $picture_commentator, $text_comment) {
    $database = dbConnect();
    $statement = $database->prepare("INSERT INTO comments(id_post, name_commentator, picture_commentator, text_comment, date_comment) VALUES(:id_post, :name_commentator, :picture_commentator, :text_comment, NOW())");
    $statement->execute(array(":id_post"=>$id_post, ":name_commentator"=>$name_commentator, ":picture_commentator"=>$picture_commentator, ":text_comment"=>$text_comment));
}