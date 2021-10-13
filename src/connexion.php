<html>

    <header>
        <title>Connexion</title>
        <link rel="stylesheet" href="style/style_connexion.css">
    </header>

    <body>
        <form methode="post" class="div-connexion">
        
            <h1 class="titre">Connexion</h1>
            <input type="text" placeholder="Identifiant"  class="field "name="identifiant">
            <br>
            <br>
            <input type="password" placeholder="Mot de passe" class="field" name ="password">
            <br>
            <br>
            <input type="checkbox" class="stay-connected" value="Rester connecté" name="stay">
            <span style="color: #FFFFFF"> Rester connecté</span>
            <br>
            <br>
            <input type="submit" class="validation-button" value="Se connecter">

            <a class="link" href="mdp_foget.php"> Mot de passe oublié</a>
            <br>
            <br>
            <a class="link" href="new_acompte">Crée un compte</a>
        </from>

</body>


</html>
