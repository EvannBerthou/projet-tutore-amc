<html>

    <head> 
        <link rel='icon' type='image/svg' sizes='25x25' href='svg/logo.svg'>
        <title>Connexion</title>
        <!--<link rel="stylesheet" href="style/style_connexion.css">-->
        
    </head>

    <body>
        <form methode="post" action="action.php" class="div-connexion">
        
            <h1 class="titre">Connexion</h1>
            <input type="text" placeholder="Identifiant"  class="field "name="identifiant">
            <br>
            <br>
            <input type="password" placeholder="Mot de passe" class="field" name ="mdp">
            <br>
            <br>
            <input type="checkbox" class="stay-connected" value="Rester connecté" name="stay">
            <span style="color: #FFFFFF"> Rester connecté</span>
            <br>
            <br>
            <input type="submit" class="validation-button" value="Se connecter">

            <br>
            <br>
        </form>

    </body>


</html>
