

<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/notification.css">
    <title>Document</title>
</head>

<body>

<div class="containerNotifications">

    <?php
    foreach ($subscriber_requests as $subscriber_request) {
    ?>
        
        <div class="containerNotification">
            <a href="index.php?action=accountProfil&id_user=<?= $subscriber_request['id_friend'] ?>"><img class="pictureAccountRequest" src="images/<?= $subscriber_request["picture_friend"] ?>"></a>
            <a href="index.php?action=accountProfil&id_user=<?= $subscriber_request['id_friend'] ?>"><?= $subscriber_request["name_friend"] ?></a>

            <div class="containerAnswer">
                <a href="index.php?action=acceptSubscribe&id_friend=<?=$subscriber_request["id_friend"]?>"><img class="answer accept" src="icon/accept.png" alt="" srcset=""></a>
                <a href="index.php?action=refuseSubscribe&id_friend=<?=$subscriber_request["id_friend"]?>"><img class="answer refuse" src="icon/remove.png" alt="" srcset=""></a>
            </div>
        </div>

    <?php
    }
    ?>

</div>

</body>




</html>




<?php $content = ob_get_clean(); ?>

<?php require('layout/menu.php') ?>