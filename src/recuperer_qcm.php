<?php

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
