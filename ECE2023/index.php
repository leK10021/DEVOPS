<?php
require_once('src/controllers/homeController.php');
require_once('src/controllers/user/signup.php');
require_once('src/controllers/user/login.php');
require_once('src/controllers/user/profil.php');
require_once('src/controllers/homePage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/subscriber.php');
require_once('src/controllers/searchAccount.php');
require_once('src/controllers/message.php');





if (isset($_GET['action']) && $_GET['action'] !== '') {

	if($_GET['action'] === 'signup') {

        signUp($_POST);

    }elseif($_GET['action'] === 'signupForm'){

        if(!isset($error)){

            $error = "";
            $color = "#00000000";
    
        }
        signupForm($error, $color);

    }elseif($_GET['action'] === 'confirmation'){

        if(empty($_GET['keymail'])){

            echo "Erreur 404 : la page que vous recherchez n'existe pas.";

        }else{
            $keymail = $_GET['keymail'];
            $email = $_GET['email'];
            mailConfirmation($email, $keymail);
            $error = "Votre compte est bien activé";
            $color = "green";
            loginForm($error, $color);
        }

    }elseif($_GET['action'] === 'login'){

        login($_POST);

    }elseif($_GET['action'] === 'loginForm'){
        
        if(!isset($error)){

            $color = "#00000000";
            $error = "";
    
        }
        loginForm($error, $color);

    }elseif($_GET['action'] === 'homePage'){
        
        homePage();

    }
    elseif($_GET['action'] === 'profilPage'){
        
        profilPage();

    }elseif($_GET['action'] === 'createComment'){
        
        createComment($_POST);

    }elseif($_GET['action'] === 'like'){

        likePost($_POST);

    }elseif($_GET['action'] === 'favori'){

        favoriPost($_POST);

    }elseif($_GET['action'] === 'createPostForm'){

        createPostForm();

    }elseif($_GET['action'] === 'addPost'){

        createPost($_POST,$_FILES);

    }elseif($_GET['action'] === 'profilForm'){

        if(!isset($error)){

            $color = "#00000000";
            $error = "";
            $color2 = "#000000";
            $error2 = "";

        }

        profilForm($error,$error2,$color,$color2);

    }elseif($_GET['action'] === 'modifProfil'){

        modifProfil($_POST);

    }elseif($_GET['action'] === 'notificationPage'){

        notificationPage();

    }elseif($_GET['action'] === 'searchAccount'){

        searchAccount($_POST);

    }elseif($_GET['action'] === 'pictureForm'){

        if(!isset($error)){

            $color = "#00000000";
            $error = "";

        }
        pictureForm($error,$color);

    }elseif($_GET['action'] === 'modifPicture'){

        modifPicture($_FILES);

    }elseif($_GET['action'] === 'resetPwd'){

        if(!isset($error2)){

            $color = "#00000000";
            $error2 = "";

        }
        resetPwd($_POST,$error2,$color);

    }elseif($_GET['action'] === 'newPwd'){

        newPwd($_POST);

    }elseif($_GET['action'] === 'pwdForm'){

        if(empty($_GET['keymail'])){

            echo "Erreur 404 : la page que vous recherchez n'existe pas.";

        }else{

            if(!isset($error)){

                $color = "#00000000";
                $error = "";

            }
            pwdForm($error,$color);
        }

    }elseif($_GET['action'] === 'acceptSubscribe'){

        acceptSubscribe($_GET["id_friend"]);

    }elseif($_GET['action'] === 'refuseSubscribe'){

        refuseSubscribe($_GET["id_friend"]);
        
    }elseif($_GET['action'] === 'messagePage'){

        messagePage();
        
    }elseif($_GET['action'] === 'conversationForm'){

        conversationForm($_GET["id_friend"]);
        
    }elseif($_GET['action'] === 'accountProfil'){

        $id_user = $_GET["id_user"];
        AccountProfil($id_user);
        
    }elseif($_GET['action'] === 'sendRequest'){

        sendRequest($_POST);
        
    }elseif($_GET['action'] === 'createMessage'){
        
        createMessage($_POST);
         
     }else{

    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";

	}

} else {

    if(!isset($error)){

        $color="#00000000";
        $error = "";

    }

    loginForm($error, $color);

}