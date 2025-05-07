let currentIndex = 0;
let score = 0;
let id_joueur = 0;
let id_categorie = 0;
let questions = [];
let nb = 5;

function enregistrerScore() {

    $.post('../Controleurs/controleurs.php',
            {
                'commande': 'enregistrerScore',
                'type': id_categorie,
                'score': score,
                'joueur' :id_joueur
            }
    )
            .done(function (data, stat, xhr) {

                console.log(data);
                

            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });

}


function afficherQuestion(data) {

    if (questions.length === 0) {
        document.getElementById("question").innerText = "Désolé pas de question !";
        document.getElementById("answerInput").style.display = "none";
        document.getElementById("valider").style.display = "none";

    } else if (currentIndex < questions.length) {
        document.getElementById("index").innerText = 'Question ' + (currentIndex+1) + '/' + questions.length;
        document.getElementById("question").innerText = questions[currentIndex].intitule;
        document.getElementById("answerInput").value = "";
        document.getElementById("answerInput").focus();
    } else {
        document.getElementById("index").style.display = "none";
        document.getElementById("question").innerText = "Quiz terminé !";
        document.getElementById("answerInput").style.display = "none";
        document.getElementById("valider").style.display = "none";
        document.getElementById("result").innerText = `Votre score : ${score} / ${questions.length}`;
        enregistrerScore();
    }
}

function verifierReponse() {
    const userAnswer = document.getElementById("answerInput").value.trim().toLowerCase();
    const correctAnswer = questions[currentIndex].reponse.toLowerCase();

    if (userAnswer === correctAnswer) {
        score++;
    }

    currentIndex++;
    afficherQuestion();
}



function demanderQuestions(type, nb) {
    $.post('../Controleurs/controleurs.php',
            {
                'commande': 'obtenirQuestions',
                'type': type,
                'nb': nb
            }
    )
            .done(function (data, stat, xhr) {

                console.log(data);
                questions = data;
                afficherQuestion();

            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}


$(document).ready(function ()
{
    console.log("Quiz Question categorie : ");
    id_categorie = $('#categorie').text();
    id_joueur = $('#id_joueur').text();
    console.log('id_categorie :' + id_categorie);
    console.log('id_joueur :' + id_joueur);

    $('#valider').click(function () {
        verifierReponse();
    });


    demanderQuestions(id_categorie, nb);


});


