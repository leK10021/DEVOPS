<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/authentification.css">
    <title>Document</title>
</head>
<body>
<div class="containerForms">
        <h1 class="titleSignup">Connectez-vous à <span class="logo">EceBook</span></h1>
        <hr>
        <form class="formStudent" action="index.php?action=login" method="post">
            
            <div>
                <label>Email</label>
                <input type="email" name="email"></input>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password"></input>
            </div>
            
            <div class="error" style="border : solid 1px <?= $color ?>; border-left: solid 4px <?= $color ?>; color : <?= $color ?>"> <?= $error ?></div>

            <div class="containerRedirections">
                <input type="submit" value="Connexion">
                <span>Vous n'avez pas de compte ?</span>
                <a href="index.php?action=signupForm">Inscrivez-vous !</a>
            </div>
        </form>
    </div>
</body>
</html>