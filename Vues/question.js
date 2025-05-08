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
                'joueur': id_joueur
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


function afficherQuestion() {

    if (questions.length === 0) {
        $("#question").text("Désolé pas de question !");
        $("#reponseJoueur").hide();
        $("#valider").hide();


    } else if (currentIndex < questions.length) {
        $("#index").text('Question ' + (currentIndex + 1) + '/' + questions.length);
        $("#question").text(questions[currentIndex].intitule);
        $("#reponseJoueur").val("").focus();

    } else {
        $("#index").hide();
        $("#question").text("Quiz terminé !");
        $("#reponseJoueur").hide();
        $("#valider").hide();
        $("#result").text(`Vous avez bien répondu à ${score} questions sur ${questions.length}`);
        enregistrerScore();
    }
}

function verifierReponse() {
    let  reponseJoueur = $("#reponseJoueur").val().trim().toLowerCase();
    let  reponseAttendue = questions[currentIndex].reponse.toLowerCase();

    if (reponseJoueur === reponseAttendue) {
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
    
    id_categorie = $('#categorie').text();
    id_joueur = $('#id_joueur').text();
    console.log('id_categorie :' + id_categorie);
    console.log('id_joueur :' + id_joueur);

    $('#valider').click(function () {
        verifierReponse();
    });


    demanderQuestions(id_categorie, nb);


});


