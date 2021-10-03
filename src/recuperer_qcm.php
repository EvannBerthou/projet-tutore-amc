<?php

$filename = "questions_filtered-sujet.pdf";
$filepath = "../output/$filename";
header("Content-disposition: attachment;filename=$filepath");
readfile($filepath);

?>
