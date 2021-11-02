<?php

require("param.php");


function getqcms($id){
    
    $qcms=Array();
    $cnx=mysqli_connect($host,$login,$pwd) or die("erreur de connexion");
    mysqli_select_db($cnx,"projet");
    $re=" select * from qcm where idprof in (select id from users where identifiant=$id) order by matiere;"
    $result=mysqli_query($cnx,$re);
    while ($qcm=mysqli_fetch_assoc($result)){
        $qcms[]=$qcm;       
    }
    return $qcms;
}


function getusers(){
     
    $users=Array();
    $cnx=mysqli_connect($host,$login,$pwd) or die("erreur de connexion");
    mysqli_select_db($cnx,"projet");
    $re=" select * from users;"
    $result=mysqli_query($cnx,$re);
    while ($user=mysqli_fetch_assoc($result)){
        $users[]=$user;       
    }
    return $users;
}


function getqcmquestions($id){
    $allquestions=Array();
    $cnx=mysqli_connect($host,$login,$pwd) or die("erreur de connexion");
    mysqli_select_db($cnx,"projet");
    $re="select * from question where idqcm in (select id from qcm where idqcm=$id);"
    $result=mysqli_query($cnx,$re);
    while ($question=mysqli_fetch_assoc($result)){
        $allquestions[]=getqcmreponses($question);      
    }
    return $allquestions;
}

function getqcmreponses($question){
    $allreponses=Array();
    $cnx=mysqli_connect($host,$login,$pwd) or die("erreur de connexion");
    mysqli_select_db($cnx,"projet");
    $re="select * from reponse where idquestion  in (select id from question where id=$question[0]);"; 
    $result=mysqli_query($cnx,$re);
    while ($reponse=mysqli_fetch_assoc($result)){
        $allreponses[]=$reponse;       
    }
    return $allreponses;
}

?>
