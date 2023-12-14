<link rel="stylesheet" href="CSS/email.css">


<?php

require_once('src/models/user/signup.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
require_once('PHPMailer/PHPMailer.php');
require_once('PHPMailer/Exception.php');
require_once('PHPMailer/SMTP.php');

function signUp($form)
{

	if (!empty($form['lastname']) && !empty($form['firstname']) && !empty($form['email']) && !empty($form['password']) && !empty($form['promo'])) {
    	$error;
		$color = "red";
		$lastname = $form['lastname'];
    	$firstname = $form['firstname'];
		$email = $form['email'];
    	$promo = $form['promo'];
		$type = $form['type'];
		$password = md5($form['password']);
		$confirmation = 0;
		
		


		if(testMail($email) == 1){

			$error = "Un compte avec cette adresse mail existe déjà";
			signupForm($error, $color);

		
		}elseif (strlen($form['password']) < 8) {
			$error="Le mot de passe doit contenir au moins 8 caractères.";
			signupForm($error, $color);

		}elseif (!preg_match("/[A-Z]/", $form['password'])) {
			$error="Le mot de passe doit contenir au moins une majuscule.";
			signupForm($error, $color);

		} elseif (!preg_match("/\d/", $form['password'])) {
			$error="Le mot de passe doit contenir au moins un chiffre.";
			signupForm($error, $color);

		}elseif (!preg_match("/[\W_]/", $form['password'])) {
			$error="Le mot de passe doit contenir au moins un caractère spécial.";
			signupForm($error, $color);

		}else{
			$keymail = $code = rand(100000000, 999999999);			
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = 'smtp.sendgrid.net'; 
			$mail->SMTPAuth = true;
			$mail->Username = 'apikey'; 
			$mail->Password = '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';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom('jacinto.valentino27@gmail.com', 'ECEBOOK2023'); 
			$mail->addAddress($email, $firstname); 
			$mail->isHTML(true);
			$mail->Subject = 'Activation de compte';
			$mail->Body = '
			<html>
			<head>
				<style>
					@keyframes slideInDown {
						from {
							transform: translateY(-100%);
						}
						to {
							transform: translateY(0);
						}
					}
					@keyframes pulse {
						from {
							transform: scale(1);
						}
						to {
							transform: scale(1.2);
						}
					}
					.greeting {
						font-size: 28px;
						font-weight: bold;
						color: #2fced4;
						animation: slideInDown 1s forwards;
					}
					.message {
						font-size: 16px;
						line-height: 1.5;
						color: #2fced4;
						margin: 20px 0;
					}
					.activation-link {
						display: inline-block;
						padding: 10px 20px;
						background-color: #00bfff;
						color: #2fced4;
						text-decoration: none;
						border-radius: 5px;
						animation: pulse 1s infinite alternate;
					}
					.signature {
						font-style: italic;
						font-weight: bold;
						color: #2fced4;
						margin-top: 20px;
					}
					.container {
						max-width: 600px;
						margin: auto;
						background-color: #fff;
						padding: 20px;
						border-radius: 10px;
						box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
					}
					.logo {
						
						color: #2fced4;
						font-size: 3vw;
						
					}
				</style>
			</head>
				<body>
					<div class="container">


						<h1 class="logo"> Ecebook </h1>


						<p class="greeting">Bonjour ' . $firstname . ',</p>

						<p class="message">Merci de vous être inscrit sur notre site. Pour activer votre compte, veuillez cliquer sur le lien suivant :</p>

						<p><a class="activation-link" href="http://localhost/Programation/ECE2023/index.php?action=confirmation&email='.$email.'&keymail='.$keymail.'">Activer mon compte</a></p>
						<img src="https://tse2.mm.bing.net/th?id=OIP.CLG7YebeMIfi0obKK2f_IgHaE8&pid=Api&P=0" alt="reseau">
						<p class="signature">Cordialement,<br>EceBook</p>
					</div>
				</body>
			</html>';
		
		

			if (!$mail->send()) {
				$error = "le mail n'est pas envoyé";
				signupForm($error, $color);
			} else {
				$error = 'Un e-mail d\'activation de compte a été envoyé à l\'adresse mail ';
				$color = "green";
				addUser($firstname, $lastname, $email, $password, $promo, $type, $confirmation, $keymail);
				signupForm($error, $color);
			}



			
			
		}

	
	}elseif(empty($form['lastname']) || empty($form['firstname']) || empty($form['email']) || empty($form['password']) ||  empty($form['promo']))
	{
		$color = "red";
    	$error='Veuillez remplir les champs';
		signupForm($error, $color);
	}
	
}

function signupForm($error, $color){
    require("templates/signupForm.php");
}

function mailConfirmation($email, $keymail){
	confirmation($email, $keymail);
}




