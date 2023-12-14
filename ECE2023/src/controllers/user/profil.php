<?php

require_once('src/controllers/homeController.php');
require_once('src/models/post.php');
require_once('src/models/user/profil.php');

use MyApp\PHPMailer2;

require 'PHPMailer/PHPMailer2.php';
require 'PHPMailer/SMTP2.php';
require 'PHPMailer/Exception2.php';
require_once 'PHPMailer/PHPMailer2.php';
require_once 'PHPMailer/SMTP2.php';
require_once 'PHPMailer/Exception2.php';

function profilPage(){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
    $infoUser = return_infoUser($email);
    $posts_user = getPosts_user($email);
    require("templates/profilPage.php");
}

function profilForm($error,$error2,$color,$color2){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }

    $infoUser = return_infoUser($email);
    $posts_user = getPosts_user($email);
    require("templates/profilForm.php");
}

function modifProfil($form){
    $color = "red";
    $error2 = "";
    $color2 = "";
	if (!empty($form['street']) && !empty($form['city']) && !empty($form['zip']) && !empty($form['promo']) && !empty($form['description'])) {
		
        $email = sessionStart();
        if(empty($email)){
            header('Location: index.php?action=loginForm');
        }
        $street = $form['street'];
    	$city = $form['city'];
		$zip = $form['zip'];
    	$promo = $form['promo'];
		$description = $form['description'];
        $birthday = $form['birthday'];
        updateProfil($street,$city,$zip,$promo,$description,$email,$birthday);
    }else{
    	$error = 'Veuillez remplir tous les champs';
        profilForm($error,$error2,$color,$color2);
    }
}

function pictureForm($error,$color){

    require("templates/pictureForm.php");
}

function modifPicture($form){

    $color = "red";
	if (!empty($form['picture'])) {

		$email = sessionStart();
        if(empty($email)){
            header('Location: index.php?action=loginForm');
        }
        
        $target_file = "images/" . basename($_FILES["picture"]["name"]);
        $move = move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
        if($move){
        $filename = basename($_FILES["picture"]["name"]);
        updatePicture($filename,$email);
        }else{
        $error =  "La photo n'a pas été rechargée";
        pictureForm($error,$color);
        }
    }else{
    	$error = 'Veuillez ajouter une photo';
        pictureForm($error,$color);
    }
}

function resetPwd($form){
    $error = "";
	$color2 = "red";
    $color = "";
    if (!empty($form['email'])) {
        $emailForm = $form['email_form'];
        $email = $form['email'];
        if(empty($email)){
            header('Location: index.php?action=loginForm');
        }
        if($emailForm === $email){
            $keymail = $code = rand(100000000, 999999999);
            $mail = new PHPMailer2();			
			$mail->isSMTP();
			$mail->Host = 'smtp.sendgrid.net'; 
			$mail->SMTPAuth = true;
			$mail->Username = 'apikey'; 
			$mail->Password = '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';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom('jacinto.valentino27@gmail.com', 'ECEBOOK2023'); 
			$mail->addAddress($email, $email); 
			$mail->isHTML(true);
			$mail->Subject = 'réinitialisation de mot de passe';
			$mail->Body = '<p>Bonjour ' . $email . ',</p><p>Votre mot de passe a été réinitialisé. Veuillez cliquer sur le lien suivant pour ajouter un nouveau mot de passe :</p><p><a href="http://localhost/Programation/ECE2023/index.php?action=pwdForm&email='.$email.'&keymail='.$keymail.'">yo</a></p><p>Cordialement,</p><p>Nom de l\'expéditeur</p>';
			
			if (!$mail->send()) {
				$error2 =  "le mail n'est pas envoyé";
                profilForm($error,$error2,$color,$color2);
			} else {
				$error2 = 'Un e-mail d\'activation de compte a été envoyé à l\'adresse mail ';
                $color2 = 'green';
                profilForm($error,$error2,$color,$color2);
			}


        }else{
            $error2 =  "L'email renseigné ne correspond pas à votre email de création de compte";
            profilForm($error,$error2,$color,$color2);
        }
    }else{
        $error2 =  "Veuillez remplir les champs";
        profilForm($error,$error2,$color,$color2);
        }
}

function pwdForm($error,$color){
     require("templates/pwdForm.php");
}

function newPwd($form){
    $color = "red";
    $email = sessionStart();
        if(empty($email)){
            header('Location: index.php?action=loginForm');
        }

    if (!empty($form['pwd']) && !empty($form['confirmation'])){
        $confirmation = $form['confirmation'];
        $pwd = $form['pwd'];

        if (strlen($pwd) < 8) {
            $error="Le mot de passe doit contenir au moins 8 caractères.";
            pwdForm($error, $color);

        }else if (!preg_match("/[A-Z]/", $pwd)) {
            $error="Le mot de passe doit contenir au moins une majuscule.";
            pwdForm($error, $color);

        } else if (!preg_match("/\d/", $pwd)) {
            $error="Le mot de passe doit contenir au moins un chiffre.";
            pwdForm($error, $color);

        }else if (!preg_match("/[\W_]/", $pwd)) {
            $error="Le mot de passe doit contenir au moins un caractère spécial.";
            pwdForm($error, $color);
           
        }else{

         if($confirmation === $pwd){
                $pwd = md5($form['pwd']);
                updatePwd($pwd,$email);
                
         }else{    
                $error = "Les deux mots de passe ne correspondent pas.";
                pwdForm($error,$color);
            }
        }
    }else{
        $error = "Veuillez remplir les champs.";
        pwdForm($error,$color);
    }
}


function accountProfil($id_user){

    $email = sessionStart();

    if(empty($email)){
        header('Location: index.php?action=loginForm');
    }
   
    $infoAccount = return_infoUserWithId($id_user);
    $emailAccount = $infoAccount['email'];

    $posts_account = getPosts_user($emailAccount);

    


    require("templates/accountProfil.php");
}