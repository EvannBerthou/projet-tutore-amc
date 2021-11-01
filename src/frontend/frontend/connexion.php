<!Doctype html>
<html lang="fr">
    <head>
        <!--META-->
        <meta charset="UTF-8">
        <meta name="author" content="BETA">
        <meta name="description" content="Se connecter à l'application BETA">
        <!--FAVICON-->
        <link rel="icon" href="svg/favicon.ico" />
        <!--CSS-->
        <link href="style/style_connexion.css" rel="stylesheet" type="text/css">
        <!--FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
        <!--TITLE-->
        <title>Se connecter</title>
        <!--JS-->        
    </head>

    <body>
        
        
        <div class="container">

            <div class="titre">
            Se connecter
            </div>

            <form methode="post" action="" class="div-connexion">

                <div class="user_box">
                <img src="svg/user2.svg" class="icon">
                <input type="email" size="30"name="identifiant" placeholder="Adresse mail" required>
                </div>

                <div class="user_box">
                <img src="svg/user2.svg" class="icon">
                <input type="password" size="30" name="mdp" placeholder="Mot de passe" required>
                </div>

                <div class="stay_connected">
                <input type="checkbox" value="Rester connecté" name="stay">
                <span>Se souvenir de moi</span>
                <a href="#" class="forgot_pwd">Mot de passe oublié</a>
                </div>

                <div class="validation_button">
                <input type="submit" value="Se connecter">
                </div>

            </form>

        </div>
    </body>
<html>
