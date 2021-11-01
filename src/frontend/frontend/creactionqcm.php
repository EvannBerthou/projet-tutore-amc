
<!DOCTYPE html>
<html>
	<head>

	    <link rel='icon' type='image/svg' sizes='25x25' href='svg/logo.svg'>
		<meta charset="UTF-8" />
	  	<meta name="viewport" content="width=device-width, initial-scale=1" />
	  	<title>Interface Porjet Tutoré</title>
	   	<script src="script.js"></script> 
 	</head>
	<body>
	  <h2>Welcome to our totorial project</h2>


		<form action="validationtest.php" method="POST"> 
	  	<div class="title">
			<label class="titreQCM">Entrez le titre du QCM</label>
			<input type="text" name="inputtitreQCM">
		</div> 
	
		<div id="question_reponse">
		</div> 

		<div class="submitbutton">
			<input type="submit" value="Valider le QCM">
		</div>


		</form>



	</body>
	<footer>
		<div class="save_button" >
			<input type="button" value="Sauvegarder">
		</div>
		<div class="button_add_Q">
		<input type="button" value="Ajouter une question" onClick="addQuestion()" >
		</div>
	
</footer>
</html>

