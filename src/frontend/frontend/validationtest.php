<?php
	
	echo "
	<head> 
        <link rel='icon' type='image/svg' sizes='25x25' href='svg/logo.svg'>        
    </head>";
	
	echo "bonjour<br>";


	//print_r($_POST);
	echo "<br>";
	foreach($_POST as $i=>$j){
		echo "$i => $j<br>";
	}
?>

