

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
    <form action="index.php?action=addPost" method="post" enctype="multipart/form-data">
        Entrez la photo du post : <input type="file" name="picture"><br><br>
        Entrez le titre du post :<textarea name="text" cols="30" rows="10"></textarea><br><br>
        <input type="submit" value="Poster">
    </form>
</body>
</html>
<?php $content = ob_get_clean(); ?>
<?php require('layout/menu.php') ?>