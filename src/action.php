<?php

    if (isset($_POST['identifiant'],$_POST['mdp'])){
        if ($_POST['identifiant']=='test' && $_POST['mdp']=="test"){
            session_start();
            $_SESSION['cnx']='user';
            header("Location: page_utilisateur.php");
        }
        elseif ($_POST['identifiant']=='admin' && $_POST['mdp']=="admin"){
            session_start();
            $_SESSION['cnx']='admin';
            header("Location: page_admin.php");
        }
        else{
            header("Location: connexion.php?id=error");
        }
         

    }else{
        header("Location: connexion.php?id=error");

    }
    
?>