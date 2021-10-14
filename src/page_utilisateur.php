<?php
//TODO: Get user/ BD  /trier QCM par mois / panneau ("cree QCM" "corriger qcm" ) / CSS
//Gestion des submits mdifier ou etider pdf 

// array de test en attendant acces BD 
$qcms=array(
    array('ID'=>'1','Titre'=>'QCM test1 ','Date'=>'10/10/2021'),
    array('ID'=>'2','Titre'=>'QCM test2 ','Date'=>'12/10/2021'),
    array('ID'=>'3','Titre'=>'QCM test3 ','Date'=>'13/10/2021'),
    array('ID'=>'4','Titre'=>'QCM test4 ','Date'=>'14/10/2021'));


echo "
<html>
    <head>
        <title> Mon espace</title>

        <link rel='stylesheet' href='style/style_user.css'>
    </head>
    <header>
   </header>
    <body>
    <h1 class='mes_qcm'>Mes QCM</h1>
        
    <div class='menu'>
        <table>
            <thead>

                <th><span class='hello_user'>Bienvenu user</span></th>
                <th><img src='svg/user.svg' width='40' heigth='45'></th>
            </thead>
            <tbody class='menu_user'>
                <tr><td colspan='2'><a href='index.php'>Creé un QCM</a><td></tr>
                <tr><td colspan='2'><a href='correction.php'>Corriger un QCM</a><td></tr>
                <tr><td colspan='2'><a href='parametre.php'>Paramètres</a><td></tr>
                <tr><td colspan='2'><a href='deconnexion.php'>Déconnexion</a><td></tr>
            </tbody

        </table>
    </div>

    
    <div class='tab_list_qcm'>
    <table>
    <tbody>";

    for ($i=0;$i!=count($qcms);$i++){
        echo "<tr><form methode='post'action=''>
            <td><input type='hidden' name='id_qcm' value='{$qcms[$i]['ID']}'  ></td>
            <td><span>{$qcms[$i]['Titre']}</span</td>
            <td>{$qcms[$i]['Date']}</td>
            <td> <input type='submit' name='edite' value='Modifier'></td>
            <td><input type='submit' name='pdf' value='Editer en PDF'> </td> </form></tr>
            ";
    }
    echo "
    </tbody></table></div>";


    echo "
    

    </body>
    </html>";

?>