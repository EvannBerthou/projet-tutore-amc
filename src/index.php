
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Interface Porjet Tutoré</title>
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
	<input type="button" value="Ajouter une question" onClick="add_question(this)" style="position: absolute;bottom: 0;">
	</div>
	<div class="button_add_R">
</div>
	
</footer>
	<script type="text/javascript" >
	


	function savequestion(ques){
		console.log(ques)
	}

	function delAnswer(p){
		var elem = document.getElementById(p);
		var parent= elem.parentElement.parentElement		
		console.log("Del: "+p);
		parent.removeChild(elem.parentElement);
		for(var o=1;o!=parent.children.length;o++){
			console.log(o,parent.children[o],parent.children[o].children);
			parent.children[o].children[0].innerHTML="Reponse "+o;
			parent.children[o].children[1].setAttribute("name","Rinput-"+o+"-"+parent.id);
			parent.children[o].children[2].setAttribute("name","Rbox-"+o+"-"+parent.id);
			parent.children[o].children[3].setAttribute("id","D"+o);
			
		}
		console.log("supression effectuée avec succée");
	}

	function addAnswer(){
		if(!document.getElementById((document.getElementById("question_reponse").children.length-1).toString())){
			console.log("Aucune Question rentrée");
			alert("Aucune Question rentrée");
			return null;
		}

		var elem=document.getElementById((document.getElementById("question_reponse").children.length-1).toString());
		var id = parseInt(elem.id); 		
		var divReponse = document.createElement("div");
		
		var labelNumReponse=document.createElement("label");
		var inputReponse=document.createElement("input");
		var inputTrueReponse=document.createElement("input");
		var buttonDelReponse = document.createElement("input");

		
		buttonDelReponse.setAttribute("type","button");
		buttonDelReponse.setAttribute("id","D"+elem.children.length.toString());
		buttonDelReponse.setAttribute("value","Supprimer la reponse");
		buttonDelReponse.setAttribute("onClick","delAnswer(this.id)");
		
		divReponse.setAttribute("id","R"+id);

		labelNumReponse.innerHTML="\tReponse "+(elem.children.length);
		inputReponse.setAttribute("placeholder","Entrez une reponse");		
		inputReponse.setAttribute("name","Rinput-"+(elem.children.length)+"-"+id);
		inputTrueReponse.setAttribute("type","checkbox");
		inputTrueReponse.setAttribute("name","Rbox-"+(elem.children.length)+"-"+id);
		
		divReponse.appendChild(labelNumReponse);
		divReponse.appendChild(inputReponse);
		divReponse.appendChild(inputTrueReponse);
		divReponse.appendChild(buttonDelReponse);
		elem.appendChild(divReponse);



	}
	
	function add_question(e){
		console.log('add question \n'+e);
		var divParent= document.getElementById("question_reponse");
		console.log(document.getElementById("question_reponse").children);

		// if ((divParent.children.length!=0) && (divParent.children[divParent.id-1].children.length==1)){
		// 	alert("vous n'avez pas entre de reponse a la question précédente");
		// 	return null;
		// }
		var divQuestionETReponse= document.createElement("div");
		var divQuestion = document.createElement("div");

		var labelNumQuestion=document.createElement("label");
		var inputQuestion = document.createElement("input");
		var buttonAddReponse = document.createElement("input");
		
		

		buttonAddReponse.setAttribute("type","button");
		buttonAddReponse.setAttribute("value","Ajouter une reponse");
		buttonAddReponse.setAttribute("onClick","addAnswer()");

		divQuestionETReponse.setAttribute("id",divParent.children.length);
		divQuestion.setAttribute("id","Q"+divParent.children.length);

		labelNumQuestion.innerHTML= "Question "+(divParent.children.length+1); 
		inputQuestion.setAttribute("placeholder","Entrez une question");
		inputQuestion.setAttribute("name","Q-"+divParent.children.length);

		divQuestion.appendChild(labelNumQuestion);
		divQuestion.appendChild(inputQuestion);
		divQuestion.appendChild(buttonAddReponse);
		divQuestionETReponse.appendChild(divQuestion);	
		divParent.appendChild(divQuestionETReponse);		
		
	}

	</script>
</html>


