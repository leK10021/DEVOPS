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
        <h1 class="titleSignup">Rejoignez <span class="logo">EceBook</span> aujourd'hui</h1>
        <div class="change">
            <div class="selectStudent select"><span class="student">Student</span><span class="underline underlineStudent"></span> </div>
            <div class="selectTeacher select"><span class="teacher">Teacher</span><span class="underline underlineTeacher"></span></div>
        </div>
        <hr>
        <form class="formStudent" action="index.php?action=signup" method="post">
            <div>
                <label>Nom</label>
                <input type="text" name="lastname"></input>
            </div>
            <div>
                <label>Prénom</label>
                <input type="text" name="firstname"></input>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email"></input>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password"></input>
            </div>
            
            <div>
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
                <option value="M1">M2</option>
                </select>
            </div>
            
            <input type="text" name="type" value="student" style="opacity: 0; position:absolute; z-index : -1"></input>

            <div class="error" style="border : solid 1px <?= $color ?>; border-left: solid 4px <?= $color ?>; color : <?= $color ?>"> <?= $error ?></div>

            <div class="containerRedirections">
                <input type="submit" value="S'inscrire">
                <span>Vous avez déjà un compte ?</span>
                <a href="index.php?action=loginForm">Connectez-vous !</a>
            </div>
        </form>

        
        
        <form class="formTeacher" action="index.php?action=signup" method="post">
            <div>
                <label>Nom</label>
                <input type="text" name="lastname" />
            </div>
            <div>
                <label>Prénom</label>
                <input type="text" name="firstname"></input>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email"></input>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password"></input>
            </div>
            
            <div>
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
                <option value="M1">M2</option>
                </select>
            </div>
            
            <input type="text" name="type" value="teacher" style="opacity: 0; position:absolute; z-index : -1"></input>

            <div class="error" style="border : solid 1px <?= $color ?>; border-left: solid 4px <?= $color ?>; color : <?= $color ?>"> <?= $error ?></div>

            <div class="containerRedirections">
                <input type="submit" value="S'inscrire">
                <span>Vous avez déjà un compte ?</span>
                <a href="index.php?action=loginForm">Connectez-vous !</a>
            </div>
        </form>
    </div>



    <script src="JS/signupForm.js"></script>
</body>
</html>