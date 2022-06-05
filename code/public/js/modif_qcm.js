const divParent = document.querySelector("#question_reponse");
const questionTemplate = document.querySelector("#questionTemplate");
const reponseTemplate = document.querySelector("#reponseTemplate");

function addQuestion() {
    const questionCount = divParent.children.length;
    const id = questionCount + 1;
    const clone = document.importNode(questionTemplate.content, true);

    clone.querySelector(".question").setAttribute("id", `Q-${id}`);
    const titre = clone.querySelector("#questionTitre");
    titre.innerText = `Question ${id}`;

    const addReponseButton = clone.querySelector("#addReponse");
    addReponseButton.onclick = () => addReponse(id);

    const deleteQuestionButton = clone.querySelector("#deleteQuestion");
    deleteQuestionButton.onclick = () => deleteQuestion(id);

    divParent.appendChild(clone);
}

function deleteQuestion(questionId) {
    const questionToDel = document.querySelector(`div[id=Q-${questionId}]`);
    divParent.removeChild(questionToDel);
    for (let i = 1; i <= divParent.children.length; i++) {
        const reponse = divParent.children[i-1];
        reponse.setAttribute('id', `Q-${i}`);
        reponse.querySelector('label').innerText = `Question ${i}`;
        reponse.querySelector("#addReponse").onclick = () => addReponse(i);
        reponse.querySelector("#deleteQuestion").onclick = () => deleteQuestion(i);
    }
}

function addReponse(questionId) {
    const question = document.querySelector(`div[id=Q-${questionId}]`);
    const parent = question.querySelector("#reponses");

    const id = parent.children.length + 1;
    const clone = document.importNode(reponseTemplate.content, true);

    clone.children[0].setAttribute('id', `REP-${questionId}-${id}`);

    const titre = clone.querySelector("#reponseTitre");
    titre.innerText = `Réponse ${id}`;

    const checkbox = clone.querySelector("input[type='checkbox']");
    checkbox.setAttribute("name", `C-${questionId}-${id}`);

    const texte = clone.querySelector(".text_reponse");
    checkbox.setAttribute("name", `Q-${questionId}-${id}`);

    const deleteReponseInput = clone.querySelector("input[type='button']");
    deleteReponseInput.onclick = () => deleteReponse(questionId, id);

    parent.appendChild(clone);
}

function deleteReponse(questionId, reponseId) {
    const question = document.querySelector(`div[id=Q-${questionId}]`);
    const parent = question.querySelector("#reponses");
    const reponseToDel = parent.querySelector(`[id=REP-${questionId}-${reponseId}]`);
    parent.removeChild(reponseToDel);

    for (let i = 1; i <= parent.children.length; i++) {
        const reponse = parent.children[i-1];
        const format = `-${questionId}-${i}`;

        reponse.setAttribute('id', `REP${format}`);
        reponse.querySelector('label').innerText = `Réponse ${i}`;
        reponse.querySelector("input[type='checkbox']").name = `C${format}`;
        reponse.querySelector(".text_reponse").name = `R${format}`;
        reponse.querySelector("input[type='button']").onclick = () => deleteReponse(questionId, i);
    };
}
