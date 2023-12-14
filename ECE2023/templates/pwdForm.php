<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?action=newPwd" method="post">
        <input type="password" name="pwd" placeholder="Entrez le mot de passe" ><br><br>
        <input type="password" name="confirmation" placeholder="Confirmez le mot de passe"><br><br>
        <div class="error" style="border : solid 1px <?= $color ?>; border-left: solid 4px <?= $color ?>; color : <?= $color ?>"> <?= $error ?></div>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
<?php $content = ob_get_clean(); ?>

<?php require('layout/menu.php') ?>