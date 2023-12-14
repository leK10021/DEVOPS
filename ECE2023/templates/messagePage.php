<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/message.css">
    <title>Document</title>
</head>
<body>

    <div class="containerFriend">
        <?php
        foreach($user_subscribers as $user_subscriber){
        ?>

            <a href="index.php?action=conversationForm&id_friend=<?=$user_subscriber["id_friend"]?>">
                <div class="containerAccount"> 


                    <img class="pictureAccountFriend" src="images/<?= $user_subscriber["picture_friend"] ?>">
                    <?= $user_subscriber["name_friend"] ?>
                    <img class="iconSpeech" src="icon/speech-bubble.png" alt="" srcset="">
                </div>
            </a>

        <?php
        }
        ?>
    </div>
</body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('layout/menu.php') ?>