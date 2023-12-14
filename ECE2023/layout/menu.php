<?php 
    if($_GET["action"] === "homePage"){
        $colorHomeRedirection = "style='background-color : #181818c8'";
    }else{
        $colorHomeRedirection = "";
    }

    if($_GET["action"] === "profilPage"){
        $colorProfilRedirection = "style='background-color : #181818c8'";
    }else{
        $colorProfilRedirection = "";
    }

    if($_GET["action"] === "createPostForm"){
        $colorCreatePostRedirection = "style='background-color : #181818c8'";
    }else{
        $colorCreatePostRedirection = "";
    }

    if($_GET["action"] === "notificationPage"){
        $colorNotificationRedirection = "style='background-color : #181818c8'";
    }else{
        $colorNotificationRedirection = "";
    }

    if($_GET["action"] === "messagePage"){
        $colorMessageRedirection = "style='background-color : #181818c8'";
    }else{
        $colorMessageRedirection = "";
    }
    
    $popular_accounts = getPopularAccounts();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="CSS/menu.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<body>
    <div class="containerMenu">
        <nav class="menu">
            <h1 class="logo">EceBook</h1>
            <div class="containerRedirection">
                <a href="index.php?action=homePage" <?= $colorHomeRedirection ?> class="redirection">
                    <img src="icon/homeIcon.png" alt="">
                    <span>Accueil</span>
                </a>
                <a href="" class="redirection">
                    <img src="icon/searchIcon.png" alt="">
                    <span>Recherche</span>
                </a>
                <a href="" class="redirection">
                    <img src="icon/compassIcon.png" alt="">
                    <span>Découvrir</span>
                </a>    
                <a href="index.php?action=messagePage" class="redirection" <?= $colorMessageRedirection ?>>
                    <img src="icon/sendIcon.png" alt="">
                    <span>Message</span>
                </a>
                <a href="index.php?action=notificationPage" <?= $colorNotificationRedirection ?> class="redirection">
                    <img src="icon/hearthIcon.png" alt="">
                    <span>Notifications</span>
                </a>
                <a href="index.php?action=createPostForm" <?=$colorCreatePostRedirection  ?> class="redirection">
                    <img src="icon/createIcon.png" alt="">
                    <span>Créer</span>
                </a>
                <a href="index.php?action=profilPage" <?= $colorProfilRedirection ?> class="redirection">
                    <img src="icon/accountIcon.png" alt="">
                    <span>Profil</span>
                </a>
            </div>
        </nav>
    </div>

    <div class="containerSearch">
        <form class="searchForm" method="post">
            <input id="search" class="searchInput" type="text" name="search" placeholder="Recherche...">
        </form>
        <div class="containerAccountsRight">
        <?php
        foreach($popular_accounts as $popular_account) {
        ?>
                        
            <div class="containerAccountRight">
                <a href="index.php?action=accountProfil&id_user=<?= $popular_account["id_user"] ?>"><img class="imgAccountRight" src="images/<?= $popular_account["picture"] ?>"></a>

                <div class="nameAccountRight">

                <a href="index.php?action=accountProfil&id_user=<?= $popular_account["id_user"] ?>">
                    <?= $popular_account["lastname"] ?>
                    <?= $popular_account["firstname"] ?>
                </a>

                <a href="">s'abonné</a>
                
                </div>
            </div>

        <?php
        }
        ?>

        </div>
        <div id="containerAccountsSearch" class="containerAccountsSearch">
        
        </div>
    </div>
    <div class="content"><?= $content ?></div>

    
</body>

<script src="JS/addComment.js"></script>
<script src="JS/likes.js"></script>
<script src="JS/favorites.js"></script>
<script src="JS/search.js"></script>
<script src="JS/addMessage.js"></script>
<script src="JS/follow.js"></script>
<script src="JS/postSwitch.js"></script>







</html>