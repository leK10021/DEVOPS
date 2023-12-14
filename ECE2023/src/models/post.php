<?php

require_once('src/models/homeModel.php');




function getPosts_user($email){
    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare('SELECT * FROM posts WHERE id_user = :id_user ORDER BY date_post DESC');
    $statement->execute(array(":id_user"=>$infoUser['id_user']));
    $posts = [];
    $comments = [];



    while (($row = $statement->fetch())) {
        
        $date0 = $row["date_post"];
        date_default_timezone_set('Europe/Paris');
        $date1 = new DateTime($date0);
        $date2 = new DateTime(); // Date actuelle

        $interval = $date2->diff($date1);
        $seconds = $interval->s;
        $minutes = $interval->i;
        $hours = $interval->h;
        $days = $interval->d;
        $months = $interval->m;
        $years = $interval->y;

        if ($years > 0) {
            $output = $years . ' an';
            if ($years > 1) {
                $output .= 's';
            }
        }else if ($months > 0) {
            $output = $months . ' mois ';
        }else if ($days > 0) {
            $output = $days . ' jour';
            if ($days > 1) {
                $output .= 's';
            }
        }else if ($hours > 0) {
            $output = $hours . ' heure';
            if ($hours > 1) {
                $output .= 's';
            }
        }else if ($minutes > 0) {
            $output = $minutes . ' minute';
            if ($minutes > 1) {
                $output .= 's';
            }
        }else if ($seconds > 0) {
            $output = $seconds . ' seconde';
            if ($seconds > 1) {
                $output .= 's';
            }
        }
        $statement1 = $database->prepare('SELECT COUNT(*) as likes_count FROM likes WHERE id_post = :id_post');
        $statement1->execute(array(":id_post"=>$row['id_post']));
        $nb_likes = $statement1->fetchColumn();
        

        $comments = getComments($row['id_post']);
        $post = [
            'id_post' => $row['id_post'],
            'name_user' => $row['name_user'],
            'picture_user' => $row['picture_user'],
            'picture_post' => $row['picture_post'],
            'text' => $row['text'],
            'date_post' => $output,
            'nb_likes' => $nb_likes,
            'comments' => $comments
        ];
        $posts[] = $post;

    }

    

    return $posts;

}

function getPosts_subscribers($email){
    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare("SELECT p.* FROM posts p INNER JOIN subscribers s ON p.id_user = s.id_friend WHERE s.id_user = :id_user AND s.confirmation = 1 ORDER BY date_post DESC");
    $statement->execute(array(":id_user"=>$infoUser['id_user']));
    $posts = [];
    $comments = [];



    while (($row = $statement->fetch())) {

        $date0 = $row["date_post"];
        date_default_timezone_set('Europe/Paris');
        $date1 = new DateTime($date0);
        $date2 = new DateTime(); // Date actuelle

        $interval = $date2->diff($date1);
        $seconds = $interval->s;
        $minutes = $interval->i;
        $hours = $interval->h;
        $days = $interval->d;
        $months = $interval->m;
        $years = $interval->y;

        if ($years > 0) {
            $output = $years . ' an';
            if ($years > 1) {
                $output .= 's';
            }
        }else if ($months > 0) {
            $output = $months . ' mois ';
        }else if ($days > 0) {
            $output = $days . ' jour';
            if ($days > 1) {
                $output .= 's';
            }
        }else if ($hours > 0) {
            $output = $hours . ' heure';
            if ($hours > 1) {
                $output .= 's';
            }
        }else if ($minutes > 0) {
            $output = $minutes . ' minute';
            if ($minutes > 1) {
                $output .= 's';
            }
        }else if ($seconds > 0) {
            $output = $seconds . ' seconde';
            if ($seconds > 1) {
                $output .= 's';
            }
        }

        $statement1 = $database->prepare('SELECT COUNT(*) as likes_count FROM likes WHERE id_post = :id_post');
        $statement1->execute(array(":id_post"=>$row['id_post']));
        $nb_likes = $statement1->fetchColumn();

        $comments = getComments($row['id_post']);
        $post = [
            'id_user' => $row['id_user'],
            'id_post' => $row['id_post'],
            'name_user' => $row['name_user'],
            'picture_user' => $row['picture_user'],
            'picture_post' => $row['picture_post'],
            'text' => $row['text'],
            'date_post' => $output,
            'nb_likes' => $nb_likes,
            'comments' => $comments
        ];

        $posts[] = $post;
    }

    return $posts;

}

function addPost($picture_post, $text, $id_user, $name, $picture_user){
    $database = dbConnect();
    $statement = $database->prepare('INSERT INTO posts(id_user, name_user, picture_user, picture_post,  text, date_post) VALUES(:id_user, :name_user, :picture_user, :picture_post, :text, NOW())');
    $statement->execute(array(":id_user"=>$id_user, ":name_user"=>$name, ":picture_user"=>$picture_user, ":picture_post"=>$picture_post, ":text"=>$text));
    header('Location: index.php?action=homePage');
}

function getComments($id_post){
    $database = dbConnect();
    $statement = $database->prepare('SELECT * FROM comments WHERE id_post = :id_post ORDER BY id_comment DESC');
    $statement->execute(array(":id_post"=>$id_post));
    $comments = [];

    while (($row = $statement->fetch())) {
        
        $date0 = $row["date_comment"];
        date_default_timezone_set('Europe/Paris');
        $date1 = new DateTime($date0);
        $date2 = new DateTime(); // Date actuelle

        $interval = $date2->diff($date1);
        $seconds = $interval->s;
        $minutes = $interval->i;
        $hours = $interval->h;
        $days = $interval->d;
        $months = $interval->m;
        $years = $interval->y;

        if ($years > 0) {
            $output = $years . ' an';
            if ($years > 1) {
                $output .= 's';
            }
        }else if ($months > 0) {
            $output = $months . ' mois ';
        }else if ($days > 0) {
            $output = $days . ' jour';
            if ($days > 1) {
                $output .= 's';
            }
        }else if ($hours > 0) {
            $output = $hours . ' heure';
            if ($hours > 1) {
                $output .= 's';
            }
        }else if ($minutes > 0) {
            $output = $minutes . ' minute';
            if ($minutes > 1) {
                $output .= 's';
            }
        }else if ($seconds > 0) {
            $output = $seconds . ' seconde';
            if ($seconds > 1) {
                $output .= 's';
            }
        }

        $comment = [
            'id_comment' => $row['id_comment'],
            'id_commentator' => $row['id_commentator'],
            'name_commentator' => $row['name_commentator'],
            'picture_commentator' => $row['picture_commentator'],
            'text_comment' => $row['text_comment'],
            'date_comment' => $output,
        ];

        $comments[] = $comment;
    }
    return $comments;
}

function addLike($id_post, $email){
    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare('SELECT * FROM likes where id_user = :id_user AND id_post = :id_post');
    $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    $row = $statement->fetch();

    if($row > 0){
        $statement = $database->prepare('DELETE FROM likes where id_user = :id_user AND id_post = :id_post');
        $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    }else{
        $statement = $database->prepare('INSERT INTO likes(id_user, id_post) VALUES(:id_user, :id_post)');
        $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    }

    return $row;

}

function testLike($id_post, $email){

    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare('SELECT * FROM likes where id_user = :id_user AND id_post = :id_post');
    $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    $row = $statement->fetch();

    return $row;

}


function addFavori($id_post, $email){
    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare('SELECT * FROM favorites where id_user = :id_user AND id_post = :id_post');
    $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    $row = $statement->fetch();

    if($row > 0){
        $statement = $database->prepare('DELETE FROM favorites where id_user = :id_user AND id_post = :id_post');
        $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    }else{
        $statement = $database->prepare('INSERT INTO favorites(id_user, id_post) VALUES(:id_user, :id_post)');
        $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    }

    return $row;

}

function testFavori($id_post, $email){
    
    $database = dbConnect();
    $infoUser = return_infoUser($email);
    $statement = $database->prepare('SELECT * FROM favorites where id_user = :id_user AND id_post = :id_post');
    $statement->execute(array(":id_user"=>$infoUser['id_user'], ":id_post"=>$id_post));
    $row = $statement->fetch();

    return $row;

}