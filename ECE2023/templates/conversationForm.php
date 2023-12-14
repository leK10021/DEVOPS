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

    <div class="headerConversation">
        <a href="index.php?action=accountProfil&id_user=<?= $infoFriend["id_user"] ?>"><img class="imgFriend" src="images/<?=$infoFriend["picture"];?>" alt=""></a>
        <a href="index.php?action=accountProfil&id_user=<?= $infoFriend["id_user"] ?>"><?= $infoFriend["firstname"].' '.$infoFriend["lastname"]?></a>
    </div>


    <div class="containerConversation">
        <?php
        foreach($messages as $message){
            if($message["id_user"] == $id_user){
                echo'<div class="containerMessage"><div class="containerMessageRight"> '.$message["text"].' </div></div>';
            }else{
                echo'<div class="containerMessage"><div class="containerMessageLeft"> '.$message["text"].' </div></div>';
            }
        
        }
        ?>
    </div>


    <form onsubmit="return false;">
        <input style="opacity:0; position:absolute"type="text" value=<?= $infoFriend['id_user'] ?> id="id_friend">
        <div class="containerInput">
            <input type="text" id="inputMessage" class="inputMessage" placeholder="Envoyer un message...">
            <input class="sendMessage" type="submit" value="envoie" id="btnMessage">
        </div>
    </form>



</body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('layout/menu.php') ?>