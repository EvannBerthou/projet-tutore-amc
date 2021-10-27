<?php
//TODO: Get user/ BD  /trier QCM par mois / panneau ("cree QCM" "corriger qcm" ) / CSS
//Gestion des submits mdifier ou etider pdf 




// array de test en attendant acces BD 
$qcms=array(
    array('ID'=>'1','Titre'=>'QCM test1 ','Date'=>'10/10/2021'),
    array('ID'=>'2','Titre'=>'QCM test2 ','Date'=>'12/10/2021'),
    array('ID'=>'3','Titre'=>'QCM test3 ','Date'=>'13/10/2021'),
    array('ID'=>'4','Titre'=>'QCM test4 ','Date'=>'14/10/2021'));
?>

<html>
    <head>
        <title> Mon espace</title>

        <link rel='stylesheet' href='style/style_user.css'>
        <link rel='icon' type='image/svg' sizes='25x25' href='svg/logo.svg'>
        </head>
    <header>
   </header>
    <body>
    <h1 class='mes_qcm'>Mes QCM</h1>
        
    <div class='logo_user'>
        <span class='hello_user'>Bienvenu user</span>
        <img src='svg/user.svg' width='40' heigth='45'>
    </div>
    
    <div  class='menu_user'>
        <ul>
            <li> <a href='index.php'>Creé un QCM</a></li>
            <li><a href='correction.php'>Corriger un QCM</a></li>
            <li><a href='parametre.php'>Paramètres</a></li>
            <li><a href='deconnexion.php'>Déconnexion</a></li>
        </ul>    
    </div>

    <div class='tab_list_qcm'>
        <table>
        <tbody>";
        <?php
        for ($i=0;$i!=count($qcms);$i++){
        echo "<tr><form methode='post'action=''>
            <td><input type='hidden' name='id_qcm' value='{$qcms[$i]['ID']}'  ></td>
            <td><span>{$qcms[$i]['Titre']}</span</td>
            <!--<td>{$qcms[$i]['Date']}</td>-->
            <td> <input type='submit' name='edite' value='Modifier'></td>
            <td><input type='submit' name='pdf' value='Editer en PDF'> </td> </form></tr>
            ";
    }
    ?>
    </tbody></table></div>
    </body>
    </html>
