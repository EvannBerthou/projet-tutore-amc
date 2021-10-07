
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
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
		<input type="button" value="Sauvegarder" onClick="savequestion(document.getElementById('question_reponse'));">
	</div>
	<div class="button_add_Q">
	<input type="button" value="Ajouter une question" onClick="addQuestion(this)" style="position: absolute;bottom: 0;">
	</div>
<div>
	
</footer>
</html>

