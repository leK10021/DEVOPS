
<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/posts.css">
    <link rel="stylesheet" href="CSS/postsFull.css">
    <title>Document</title>
</head>

<body>

    <div class="containerPosts">

        <?php
        foreach ($posts_subscribers as $post_subscriber) {
        ?>
            <div class="containerPost">
                <div class="headerPost">
                    <a href="index.php?action=accountProfil&id_user=<?=$post_subscriber["id_user"]?>"><img class="pictureUser" src="images/<?= $post_subscriber['picture_user']?>" alt=""></a>
                    <a href="index.php?action=accountProfil&id_user=<?=$post_subscriber["id_user"]?>"><h3 class="nameUser"> <?= $post_subscriber['name_user']?></h3></a>
                    <li class="datePost"> <span><?= $post_subscriber['date_post']?></span></li>
                </div>

               <img class="picturePost" src="images/<?= $post_subscriber['picture_post']?>" alt="">
                <div class="actionPost">


                    <?php if(testLike($post_subscriber['id_post'], $email) == 0){ ?>
                        <img onclick="likeData('<?= $post_subscriber['id_post'] ?>');" src="icon/noLikeIcon.png" class='like'>
                    <?php }else{ ?>
                        <img onclick="likeData('<?= $post_subscriber['id_post'] ?>');" src="icon/likeIcon.png" class='like'>
                    <?php } ?>
                    

                    <img class="seeComment" src="icon/commentIcon.png" alt="" srcset="">

                    <?php if(testFavori($post_subscriber['id_post'], $email) == 0){ ?>
                        <img onclick="favoriData('<?= $post_subscriber['id_post'] ?>');" class="favoriIcon favori" src="icon/noFavoriIcon.png">
                    <?php }else{ ?>
                        <img onclick="favoriData('<?= $post_subscriber['id_post'] ?>');" class="favoriIcon favori" src="icon/favoriIcon.png" >
                    <?php } ?>

                </div>
                <div class="textPost">
                <?= $post_subscriber['text'] ?>
                </div>
                <span class="seeComment_2 showComment" href="">Afficher tout les commentaires...</span>
                <div class="containerComments containerComments_<?= $post_subscriber['id_post'] ?>">

                    <?php 
                    $comment_count = count($post_subscriber["comments"]);
                    $max_comments = min(3, $comment_count);
                    for($i = 0; $i < $max_comments; $i++){ ?>
                        <div class="containerComment">

                            <div class="containerTextComment">
                                <img class="pictureComment" src="images/<?= $post_subscriber["comments"][$i]["picture_commentator"] ?>" alt="">
                                <div class="textComment">
                                    <?= $post_subscriber["comments"][$i]["name_commentator"] ?> :
                                    <?= $post_subscriber["comments"][$i]["text_comment"] ?>
                                </div>
                            </div>

                            <span class="dateComment"><?= $post_subscriber["comments"][$i]["date_comment"] ?></span>
                        </div>
                    <?php } ?>

                </div>
                <form onsubmit="return false;" method="post">
                    <div class="formInvisible">
                    <input type="text" name="id_post" class="id_post" value="<?= $post_subscriber['id_post'] ?>">
                    <input type="text" name="name_commentator" class="name_commentator" value="<?= $infoUser['lastname']?> <?=$infoUser['lastname'] ?>">
                    <input type="text" name="picture_commentator" class="picture_commentator" value="<?= $infoUser['picture']?>">
                    </div>

                    <div class="formVisible">

                        <input class="inputTextComment text_comment" type="text" name="text_comment" placeholder="Ajoutez un commentaire...">
                        
                        <input class="sendBtn" type="submit">

                    </div>
                </form>
                
            </div>






            <div class="containerAllPostFull">
                <img src="icon/close.png" alt="" class="close">
                <div class="containerPostFull">

                    <div class="imgLeft">
                            <img class="imgFull" src="images/<?= $post_subscriber['picture_post']?>" alt="" srcset="">
                    </div>

                    <div class="containerRight">

                        <div class="headerPost HPFull">
                        <a href="index.php?action=accountProfil&id_user=<?=$post_subscriber["id_user"]?>"><img class="pictureUser" src="images/<?= $post_subscriber['picture_user']?>" alt=""></a>
                        <a href="index.php?action=accountProfil&id_user=<?=$post_subscriber["id_user"]?>"><h3 class="nameUser"> <?= $post_subscriber['name_user']?></h3></a>
                            <li class="datePost"> <span><?= $post_subscriber['date_post']?></span></li>
                        </div>
                        
                        <div class="containerCommentsLimit">
                            <div class="containerComments_<?= $post_subscriber['id_post'] ?>">
                                <?php foreach($post_subscriber["comments"] as $comment){ ?>
                                    <div class="containerComment" style="margin-bottom:35px">
                                        
                                        <div class="containerTextComment">
                                            <img class="pictureComment" src="images/<?= $comment["picture_commentator"] ?>" alt="">
                                            <div class="textComment">
                                                <?= $comment["name_commentator"] ?> :
                                                <?= $comment["text_comment"] ?>
                                            </div>
                                        </div>
                                        <span class="dateComment"><?= $comment["date_comment"] ?></span>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        


                        <form  onsubmit="return false;" class="form2" method="post">

                        <div class="formInvisible">
                        <input type="text" name="id_post" class="id_post_2" value="<?= $post_subscriber['id_post'] ?>">
                        <input type="text" name="name_commentator" class="name_commentator_2" value="<?= $infoUser['lastname']?> <?=$infoUser['firstname'] ?>">
                        <input type="text" name="picture_commentator" class="picture_commentator_2" value="<?= $infoUser['picture']?>">
                        </div>

                        <div class="formVisible">

                            <input class="inputTextComment text_comment_2" style="padding-left:10px" type="text" name="text_comment" placeholder="Ajoutez un commentaire...">
                            
                            <input class="sendBtn_2" type="submit">

                        </div>

                        </form>

                    </div>
                </div>
            </div>


        <?php
        }
        ?>

    </div>

</body>


<script src="JS/postSwitch.js"></script>


</html>




<?php $content = ob_get_clean(); ?>

<?php require('layout/menu.php') ?>
