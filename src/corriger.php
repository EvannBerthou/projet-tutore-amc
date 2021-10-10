<?php
function sauvegarder_fichier($fichier) {
    if ($fichier['type'] != "application/pdf") {
        die("Mauvais type de fichier");
    }

    $nom_fichier = basename($fichier['name']);
    $chemin_sauvegarde = "../save/" . $nom_fichier;
    if (!move_uploaded_file($fichier['tmp_name'], $chemin_sauvegarde)) {
        die("Erreur lors de la sauvegarde du fichier");
    }
    return $chemin_sauvegarde;
}

function corriger_fichier($fichier) {
    $command = "../correction.sh $fichier";
    $escaped = escapeshellcmd($command);
    passthru($escaped);
}

$fichier = $_FILES['fichier'];
$chemin_sauvegarde = sauvegarder_fichier($fichier);
corriger_fichier($chemin_sauvegarde);
?>
