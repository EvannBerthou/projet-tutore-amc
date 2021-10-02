<?php 
function check_die($res) {
    if (!$res) die($res);
    return $res;
}

function ecrire_questions_fichier($fichier, $questions) {
    $chemin_fichier = "questions/$fichier";
    $fp = check_die(fopen($chemin_fichier, 'w'));

    foreach ($questions as $question) {
        check_die(fwrite($fp, "* $question[0]\n"));
        foreach (array_slice($question, 1) as $reponse) {
            $sign = $reponse[1] ? '+' : '-'; check_die(fwrite($fp, "$sign $reponse[0]\n"));
        }
        check_die(fwrite($fp, "\n"));
    }

    fclose($fp);
}

function creer_qcm($fichier) {
    $command = "./compile.sh $fichier";
    $escaped = escapeshellcmd($command);
    shell_exec($escaped);
}

clearstatcache();

// Doit être remplacé par les informations à récupérer dans le $_POST
$data = array(
    "questions.txt", 
    array('question 1', array('réponse 1', true), array('réponse 2', false)),
    array('question 2', array('réponse 1', false), array('réponse 2', true)),
    array('question 3', array('réponse 3', false), array('réponse 2', true)),
    array('question 4', array('réponse 3', false), array('réponse 2', true)),
    array('question 5', array('réponse 3', false), array('réponse 2', true)),
);
echo "Je suis un test";
ecrire_questions_fichier($data[0], array_slice($data, 1));
creer_qcm($data[0]);
?>
