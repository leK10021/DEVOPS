<?php

require_once('src/controllers/homeController.php');
require_once('src/models/searchAccount.php');

function searchAccount($form){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $text_search = $form["text_search"];

    if (!preg_match('/^\s*$/', $text_search) && $text_search !='') {
        $searched_accounts = accountsSearched($text_search);

        $html = '';

    foreach($searched_accounts as $searched_account){
        $html .= 
        '<div class="containerAccountRight"> 
            <a href="index.php?action=accountProfil&id_user=<?= $popular_account["id_user"] ?><img class="imgAccountRight" src="images/'.$searched_account["picture"].'"></a>
            <div class="nameAccountRight">
                <a href="index.php?action=accountProfil&id_user=<?= $popular_account["id_user"] ?>
                    '.$searched_account["lastname"].'
                    '.$searched_account["firstname"].'
                </a>
                <a href="">s\'abonner</a>
            </div>
        </div>';
    }

    echo $html; 
}
}