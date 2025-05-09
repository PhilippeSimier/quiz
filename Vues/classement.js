
function afficherClassement() {

    $.post('../Controleurs/controleurs.php',
            {commande: 'obtenirClassement'}
    )
            .done(function (classement, stat, xhr) {

                console.log(classement);

                $('#classement').DataTable({
                    data: classement,
                    columns: [
                        {data: 'total'},
                        {data: 'pseudo'}                       
                    ],
                    order: [[0, 'desc']],               // première colonne (index 0), tri décroissant
                    language: {url: 'datatables_fr-FR.json'}
                });
            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}

$(document).ready(function () {
    afficherClassement();
});