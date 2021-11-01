<?php

require("param.php");


function getqcms($id){
    
    $qcms=Array();
    $cnx=mysqli_connect($host,$login,$pwd) or die("erreur de connexion");
    mysqli_select_db($cnx,"projet");
    $re=" select * from qcm where idprof in (select id from users where identifiant=$id)² order by matiere;"
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





?>
