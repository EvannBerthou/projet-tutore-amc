<!Doctype html>
<html lang="fr">
    <head>
        <!--META-->
        <meta charset="UTF-8">
        <meta name="author" content="BETA">
        <meta name="description" content="Création d'un utilisateur">
        <!--FAVICON-->
        <link rel="icon" href="svg/favicon.ico" />
        <!--CSS-->
        <link href="style/style_creation_user.css" rel="stylesheet" type="text/css">
        <!--FONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
        <!--TITLE-->
        <title>Creation d'un uttilisateur</title>
        <!--JS-->        
    </head>

    <body>
        
        
        <div class="container">

            <div class="titre">
             Crée un nouvel utilisateur
            </div>

            <form methode="post" action="" class="div-connexion">

                <div class="user_box">
                    <input type="text" zise="30" name="nom" placeholder="Nom" required> 
                </div>
               
                 <div class="user_box">
                    <input type="text" zise="30" name="prenom" placeholder="Prénom" required> 
                </div>

                <div class="user_box">
                    <input type="email" size="30"name="mail" placeholder="Adresse mail" required>
                </div>

                <div class="user_box">
                    <img src="" class="">
                    <input type="password" size="30" name="mdpfirst" placeholder="Mot de passe" required></div>
                
                <div class="user_box">
                    <img src="" class="">
                    <input type="password" size="30" name="mdpsecond" placeholder="Confirmation mot de passe" required>
                </div>
                

                <div class="validation_button">
                <input type="submit" value="VALIDER">
                </div>

            </form>

        </div>
    </body>
<html>
