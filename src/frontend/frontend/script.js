// all start at 0 

addQuestion();


function delAnswer(idDivReponse){

    var elemDelet=document.getElementById(idDivReponse);
    var parent =elemDelet.parentElement;
    parent.removeChild(elemDelet);
    parent.setAttribute("value",parseInt(parent.attributes.value.value)-1);
    
    for (var i =1;i!=parent.children.length;i++){
        parent.children[i].setAttribute("id","R-"+parent.id[2]+"-"+(i-1));
        parent.children[i].children[0].innerHTML="Reponse "+i;			
        parent.children[i].children[1].setAttribute("name","Rinput-"+parent.id[2]+"-"+(i-1));
        parent.children[i].children[2].setAttribute("name","Rbox-"+parent.id[2]+"-"+(i-1));
        parent.children[i].children[3].setAttribute("class","R-"+parent.id[2]+"-"+(i-1));
    
    }
    console.log("supression effectuée avec succée");

}

function addAnswer(e){
    
    var elem=document.getElementById("D-"+e);
    var id = parseInt(elem.id); 		
    var divReponse = document.createElement("div");
    var labelNumReponse=document.createElement("label");
    var inputReponse=document.createElement("input");
    var inputTrueReponse=document.createElement("input");
    var buttonDelReponse = document.createElement("input");

    
    buttonDelReponse.setAttribute("type","button");
    buttonDelReponse.setAttribute("class","R-"+e+"-"+elem.attributes.value.value);
    buttonDelReponse.setAttribute("value","Supprimer la reponse");
    buttonDelReponse.setAttribute("onClick","delAnswer(this.attributes.class.value)");
    
    divReponse.setAttribute("id","R-"+e+"-"+elem.attributes.value.value);

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

function delQuestion(idDiv){

    var elemDelet=document.getElementById(idDiv);
    var parent =elemDelet.parentElement;
    parent.removeChild(elemDelet);
    for(var i =0;i!=parent.children.length;i++){
        parent.children[i].children[0].children[0].innerHTML="Question "+(i+1);
    }

}

function addQuestion(){
    var divParent= document.getElementById("question_reponse");
    nbquestion=divParent.children.length;

    var divQuestionETReponse= document.createElement("div");
    var divQuestion = document.createElement("div");

    var labelNumQuestion=document.createElement("label");
    var inputQuestion = document.createElement("input");
    var inputQuestionImg =document.createElement("input");
    var buttonAddReponse = document.createElement("input");
    var buttonDelQuestion =document.createElement("input");		
    
    buttonAddReponse.setAttribute("id",divParent.children.length)
    buttonAddReponse.setAttribute("type","button");
    buttonAddReponse.setAttribute("value","Ajouter une reponse");
    buttonAddReponse.setAttribute("onClick","addAnswer(this.id)");
    
    buttonDelQuestion.setAttribute("type","button");
    buttonDelQuestion.setAttribute("class","D-"+divParent.children.length);
    buttonDelQuestion.setAttribute("value","Supprimer la question");
    buttonDelQuestion.setAttribute("onClick","delQuestion(this.attributes.class.value)");

    divQuestionETReponse.setAttribute("id","D-"+divParent.children.length);
    divQuestionETReponse.setAttribute("value",0);
    divQuestion.setAttribute("id","Q-"+divParent.children.length);


    labelNumQuestion.innerHTML= "Question "+(divParent.children.length+1); 
    inputQuestionImg.setAttribute("type","file");
    inputQuestionImg.setAttribute("name","I-"+divParent.children.length);
    inputQuestionImg.setAttribute("accept","image/png, image/jpeg, image/jpg, image/tiff");
    inputQuestionImg.setAttribute("class","input_file");



    inputQuestion.setAttribute("placeholder","Entrez une question");
    inputQuestion.setAttribute("name","Q-"+divParent.children.length);



    divQuestion.appendChild(labelNumQuestion);
    divQuestion.appendChild(inputQuestionImg);
    divQuestion.appendChild(inputQuestion);
    divQuestion.appendChild(buttonAddReponse);
    divQuestion.appendChild(buttonDelQuestion);
    divQuestionETReponse.appendChild(divQuestion);	
    divParent.appendChild(divQuestionETReponse);		
    
}