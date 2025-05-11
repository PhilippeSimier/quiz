function togglePassword(fieldId, iconElement) {
    
    const input = document.getElementById(fieldId);
    const icon = iconElement.querySelector('i');
    
    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

function creerCompte(login, psw) {
    console.log("login : " + login);
    console.log("psw   : " + psw);

    $.get('../Controleurs/session.php', {
        login: login,
        mdp: psw,
        commande: 'creerCompte'
    }, function (response) {
        console.log('Réponse du controleur :', response);
        $("#retour").text(response);
    });

}


$(document).ready(function ()
{
    console.log("Création d'un compte");

    $('#creer').click(function () {

        let  pswdA = $("#pswdA").val();
        let  pswdB = $("#pswdB").val();
        let  login = $("#login").val();

        if (pswdA === pswdB && pswdA !== "") {

            creerCompte(login, pswdA);

        } else {
            $("#retour").text("les mots de passe ne sont pas identique !");
            $("#pswdB").val("");
            $("#pswdA").val("").focus();
        }
    });

});


