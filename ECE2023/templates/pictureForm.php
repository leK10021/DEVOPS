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
    <h1>Modifier photo de profil</h1>
    <form action="index.php?action=modifPicture" method="post" enctype="multipart/form-data">
        <input type="file" name="picture"><br><br>
        <div class="error" style="border : solid 1px <?= $color ?>; border-left: solid 4px <?= $color ?>; color : <?= $color ?>"> <?= $error ?></div>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
<?php $content = ob_get_clean(); ?>
<?php require('layout/menu.php') ?>