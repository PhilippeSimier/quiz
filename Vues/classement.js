
function afficherClassement() {

    $.post('../Controleurs/controleurs.php',
            {commande: 'obtenirClassement'}
    )
            .done(function (classement, stat, xhr) {

                console.log(classement);

                $('#classement').DataTable({
                    data: classement,
                    columns: [
                        {data: 'pseudo'},
                        {data: 'total'}
                    ],
                    language: {url: 'datatables_fr-FR.json'},

                    ordering: true // Activer le tri
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