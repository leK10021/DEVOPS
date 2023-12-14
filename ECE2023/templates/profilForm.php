<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/profilForm.css">
    <title>Document</title>
</head>
<body>

    <form class="profilForm" action="index.php?action=modifProfil" method="post" enctype="multipart/form-data">

        <h1 class="h1form">INFO UTILISATEUR</h1>
        Rue :<input type="text" name="street" value="<?=$infoUser["street"]?>">
        Ville :<input type="text" name="city" value="<?=$infoUser["city"]?>">
        Code postal :<input type="text" name="zip" value="<?=$infoUser["zip"]?>">

        <?php 
        if($infoUser["birthday"] == null){
        ?>

            Birthday :<input type="text" name="birthday" value="<?=$infoUser["birthday"]?>">

        <?php 
        }else{
        ?>
            
            <input type="text" name="birthday" value="<?=$infoUser["birthday"]?>" style="opacity: 0; position:absolute; z-index : -1">

        <?php 
        } 
        ?>
        <label>Promo</label>
        <select name="promo">
            <option value="ING1">ING1</option>
            <option value="ING2">ING2</option>
            <option value="ING3">ING3</option>
            <option value="ING4">ING4</option>
            <option value="ING5">ING5</option>
            <option value="B1">B1</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
            <option value="M1">M1</option>
            <option value="M2">M2</option>
        </select>

        Description :<textarea name="description"><?=$infoUser["description"]?></textarea>
        <div class="error" style="border : solid 1px <?= $color ?>; border-left: solid 4px <?= $color ?>; color : <?= $color ?>"> <?= $error ?></div>
        <input type="submit" value="Envoyer">

    </form>

    <form class="formPWD" action="index.php?action=resetPwd" method="post">
        <h1 class="h1form">REINITIALISER LE MOT DE PASSE</h1>
        <input type="text" name="email_form" placeholder="Entrez votre adresse email">
        <input type="text" name="email" value="<?=$email?>" style="opacity: 0; position:absolute; z-index : -1"></input>
        <div class="error2" style="border : solid 1px <?= $color2 ?>; border-left: solid 4px <?= $color2 ?>; color : <?= $color2 ?>"> <?= $error2?></div>
        <input type="submit" value="Demande de réinitialisation">
    </form></body>

</html>
<?php $content = ob_get_clean(); ?>
<?php require('layout/menu.php') ?>