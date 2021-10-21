<?php


echo "
    <head> 

        <link rel='icon' type='image/svg' sizes='25x25' href='svg/logo.svg'>
        
    </head>";




if (!isset($_GET['fichier'])) {
    die("Aucun fichier donné");
}

$fichier = $_GET['fichier'];
$chemin = "../output/$fichier";
if (!file_exists($chemin)) {
    die("Fichier non existant");
}

header("Content-disposition: attachment;filename=$chemin");
readfile($chemin);
?>
