
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
	<input type="button" value="Ajouter une question" onClick="addQuestion(this)" style="position: absolute;bottom: 0;">
	</div>
<div>
	
</footer>
	<script type="text/javascript" >
	
	var nbquestion=0; 

	function savequestion(ques){
		console.log(ques)
	}

	function delAnswer(idDivReponse){
		
	
		var elem = document.getElementById(idDivReponse);
		var parent= elem.parentElement;	
		parent.removeChild(elem);
		for(var o=1;o!=parent.children.length;o++){
			parent.children[o].children[0].innerHTML="Reponse "+o;
			parent.children[o].children[1].setAttribute("name","Rinput-"+o+"-"+parent.id);
			parent.children[o].children[2].setAttribute("name","Rbox-"+o+"-"+parent.id);
			parent.children[o].children[3].setAttribute("id","D"+o);
			
		}
		console.log("supression effectuée avec succée");
	}

	function addAnswer(e){
		
		var elem=document.getElementById("D"+e);
		var id = parseInt(elem.id); 		
		var divReponse = document.createElement("div");
		var labelNumReponse=document.createElement("label");
		var inputReponse=document.createElement("input");
		var inputTrueReponse=document.createElement("input");
		var buttonDelReponse = document.createElement("input");

		
		buttonDelReponse.setAttribute("type","button");
		buttonDelReponse.setAttribute("class","R"+e+"-"+elem.attributes.value.value);
		buttonDelReponse.setAttribute("value","Supprimer la reponse");
		buttonDelReponse.setAttribute("onClick","delAnswer(this.attributes.class.value)");
		
		divReponse.setAttribute("id","R"+e+"-"+elem.attributes.value.value);

		labelNumReponse.innerHTML="\tReponse "+(elem.children.length);
		inputReponse.setAttribute("placeholder","Entrez une reponse");		
		inputReponse.setAttribute("name","Rinput-"+(elem.children.length)+"-"+e);
		inputTrueReponse.setAttribute("type","checkbox");
		inputTrueReponse.setAttribute("name","Rbox-"+(elem.children.length)+"-"+e);
		
		divReponse.appendChild(labelNumReponse);
		divReponse.appendChild(inputReponse);
		divReponse.appendChild(inputTrueReponse);
		divReponse.appendChild(buttonDelReponse);
		elem.appendChild(divReponse);
		elem.setAttribute("value",parseInt(elem.attributes.value.value)+1);
		

	}
	
	function addQuestion(e){
		console.log('add question \n'+e+" / "+nbquestion);
		var divParent= document.getElementById("question_reponse");
		var divQuestionETReponse= document.createElement("div");
		var divQuestion = document.createElement("div");

		var labelNumQuestion=document.createElement("label");
		var inputQuestion = document.createElement("input");
		var buttonAddReponse = document.createElement("input");
		
		
		buttonAddReponse.setAttribute("id",nbquestion)
		buttonAddReponse.setAttribute("type","button");
		buttonAddReponse.setAttribute("value","Ajouter une reponse");
		buttonAddReponse.setAttribute("onClick","addAnswer(this.id)");

		divQuestionETReponse.setAttribute("id","D"+nbquestion);
		divQuestionETReponse.setAttribute("value",0);
		divQuestion.setAttribute("id","Q"+nbquestion);

		labelNumQuestion.innerHTML= "Question "+(nbquestion+1); 
		inputQuestion.setAttribute("placeholder","Entrez une question");
		inputQuestion.setAttribute("name","Q-"+nbquestion);

		divQuestion.appendChild(labelNumQuestion);
		divQuestion.appendChild(inputQuestion);
		divQuestion.appendChild(buttonAddReponse);
		divQuestionETReponse.appendChild(divQuestion);	
		divParent.appendChild(divQuestionETReponse);		
		nbquestion+=1		
	}

	</script>
</html>


