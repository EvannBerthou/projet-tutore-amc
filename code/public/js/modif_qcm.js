const divParent = document.querySelector("#question_reponse");
const questionTemplate = document.querySelector("#questionTemplate");
const reponseTemplate = document.querySelector("#reponseTemplate");
const qcmId = document.querySelector(".grid").dataset.id;

function addQuestion() {
    const questionCount = divParent.children.length;
    const id = questionCount + 1;
    const clone = document.importNode(questionTemplate.content, true);

    clone.querySelector('.question').setAttribute('name', `Q-${id}`);
    const titre = clone.querySelector("#questionTitre");
    titre.innerText = `Question ${id}`;

    const addReponseButton = clone.querySelector("#addReponse");
    addReponseButton.onclick = () => addReponse(id);

    const deleteQuestionButton = clone.querySelector("#deleteQuestion");
    deleteQuestionButton.onclick = () => deleteQuestion(id);

    divParent.appendChild(clone);
}

function deleteQuestion(questionId) {
    const questionToDel = document.querySelector(`div[name='Q-${questionId}']`);
    divParent.removeChild(questionToDel);
    for (let i = 1; i <= divParent.children.length; i++) {
        const reponse = divParent.children[i-1];
        reponse.setAttribute('name', `Q-${i}`);
        reponse.querySelector('label').innerText = `Question ${i}`;
        reponse.querySelector("#addReponse").onclick = () => addReponse(i);
        reponse.querySelector("#deleteQuestion").onclick = () => deleteQuestion(i);
    }
}

function addReponse(questionId) {
    const question = document.querySelector(`div[name='Q-${questionId}']`); 
    const parent = question.querySelector("#reponses");

    const id = parent.children.length + 1;
    const clone = document.importNode(reponseTemplate.content, true);
    const div = clone.querySelector('.reponse');
    div.setAttribute('name', `REP-${questionId}-${id}`);
    const titre = div.querySelector("#reponseTitre");
    titre.innerText = `Réponse ${id}`;

    const deleteReponseInput = clone.querySelector("input[type='button']");
    deleteReponseInput.onclick = () => deleteReponse(questionId, id);

    parent.appendChild(clone);
}

function deleteReponse(questionId, reponseId) {
    const question = document.querySelector(`div[name='Q-${questionId}']`);
    const parent = question.querySelector("#reponses");
    const reponseToDel = parent.querySelector(`div[name=REP-${questionId}-${reponseId}]`);
    parent.removeChild(reponseToDel);

    for (let i = 1; i <= parent.children.length; i++) {
        console.log(i);
        const reponse = parent.children[i-1];
        const format = `-${questionId}-${i}`;

        reponse.setAttribute('name', `REP${format}`);
        reponse.querySelector('label').innerText = `Réponse ${i}`;
        reponse.querySelector("input[type='checkbox']").name = `C${format}`;
        reponse.querySelector(".text_reponse").name = `R${format}`;
        reponse.querySelector("input[type='button']").onclick = () => deleteReponse(questionId, i);
    };
}

function generate_pdf() {
    fetch(`${window.location.origin}/api/qcm/generate/${qcmId}`)
        .then(res => res.blob())
        .then(data => {
            const file = new Blob([data], {type: 'application/pdf'});
            window.open(window.URL.createObjectURL(file));
        });
}

function save_qcm() {
    const qcm = {};
    qcm.id = parseInt(qcmId);
    qcm.titre = document.querySelector("[name='inputtitreQCM']").value;
    qcm.questions = [];
    for (const question of document.querySelectorAll('.question')) {
        const questionObject = {};
        questionObject.id = parseInt(question.id) || 0;
        questionObject.enonce = question.querySelector('#enonceQuestion').value;
        questionObject.reponses = [];
        for (const reponse of question.querySelectorAll('.reponse')) {
            const reponseObject = {};
            reponseObject.id = parseInt(reponse.id) || 0;
            reponseObject.texte = reponse.querySelector('.text_reponse').value;
            reponseObject.estCorrect = reponse.querySelector('[type="checkbox"]').checked;
            questionObject.reponses.push(reponseObject);
        }
        qcm.questions.push(questionObject);
    }
    console.log(qcm);

    const body = JSON.stringify(qcm);
    fetch(window.location.origin + "/api/qcm/" + qcmId, {method: 'POST', body})
        .then(res => location.reload());
}

if (divParent.children.length === 0) {
    addQuestion();
    addReponse(1);
}
