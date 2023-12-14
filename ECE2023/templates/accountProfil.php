<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/accountWall.css">
    <link rel="stylesheet" href="CSS/posts.css">
    <link rel="stylesheet" href="CSS/postsFull.css">

    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php ob_start(); ?>

<div class="containerWall">

<div class=headerWall>
        
        
        <a href="index.php?action=pictureForm"><img class="imgAccount" src="images/<?=$infoAccount["picture"]?>"></a> 
        
        <div class="headerWallRight">

            <div class="HeaderRightTop">
                <div class="nameAccount"><?=$infoAccount["firstname"]." ".$infoAccount["lastname"]?></div>
                <form onsubmit="return false;" method="post">

                <input type="text" id="id_friend" value="<?=$infoAccount["id_user"]?>" style="opacity: 0; position:absolute; z-index : -1">
                
                <?php 
                if(testSub($infoAccount["id_user"], $email) == 0){
                ?>
                    <input class="followBtn" type="submit" id="btnFollow" value="suivre">

                <?php 
                }elseif(testSub($infoAccount["id_user"], $email) == 1){
                ?>
                    <input class="followBtn" type="submit" id="btnUnFollow" value="Attente de vallidation">

                <?php
                }elseif(testSub($infoAccount["id_user"], $email) > 1){
                ?>
                    <input class="followBtn" type="submit" id="btnUnFollow" value="se desabonné">
                
                <?php 
                }
                ?>

                </form>
            
            </div>

            <div class="containerNumberInfo">
                <span><?=$infoAccount["nb_posts"]?> publication(s)</span>
                <span><?=$infoAccount["nb_friend"]?> ami(e)s</span>
                <span>Promo : <?=$infoAccount["promo"]?></span>
            </div>
        
            <div class="descri"><?=$infoAccount["description"]?></div>

        </div>
    </div>


    <div class="containerPostsAccount">

        <?php foreach ($posts_account as $post_account){?>

            <img class="imgPostLittle seeComment" src="images/<?=$post_account["picture_post"]?>">
            

            <div class="containerAllPostFull">
                <img src="icon/close.png" alt="" class="close">
                <div class="containerPostFull">

                    <div class="imgLeft">
                            <img class="imgFull" src="images/<?= $post_account['picture_post']?>" alt="" srcset="">
                    </div>

                    <div class="containerRight">

                        <div class="headerPost HPFull">
                            <img class="pictureUser" src="images/<?= $post_account['picture_user']?>" alt="">
                            <h3 class="nameUser"> <?= $post_account['name_user']?></h3>
                            <li class="datePost"> <span><?= $post_account['date_post']?></span></li>
                        </div>
                        
                        <div class="containerCommentsLimit">
                            <div class="containerComments_<?= $post_account['id_post'] ?>">
                                <?php foreach($post_account["comments"] as $comment){ ?>
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
                        <input type="text" name="id_post" class="id_post_2" value="<?= $post_account['id_post'] ?>"> 
                        <input type="text" name="name_commentator" class="name_commentator_2" value="<?= $infoAccount['lastname']?> <?=$infoAccount['firstname'] ?>">
                        <input type="text" name="picture_commentator" class="picture_commentator_2" value="<?= $infoAccount['picture']?>">
                        </div>

                        <div class="formVisible">

                            <input class="inputTextComment text_comment_2" style="padding-left:10px" type="text" name="text_comment" placeholder="Ajoutez un commentaire...">
                            
                            <input class="sendBtn_2" type="submit">

                        </div>

                        </form>

                    </div>
                </div>
            </div>



        <?php }?>

    </div>

</div>
<script src="JS/addComment.js"></script>
<script src="JS/follow.js"></script>



<?php $content = ob_get_clean(); ?>
<?php require('layout/menu.php'); ?>

