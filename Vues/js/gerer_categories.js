function afficherCategories(){
    
    $.post('../Controleurs/controleurs.php',
            {commande: 'obtenirCategories'}
    )
            .done(function (categories, stat, xhr) {

                console.log(categories);

                $('#categories').DataTable({
                    data: categories,
                    columns: [
                        {data: 'id', visible: false, searchable : false},
                        {data: 'nom_type'},
                        {data: 'description'}                       
                    ],
                    
                    
                    language: {url: './js/datatables_fr-FR.json'}
                });
            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}



$(document).ready(function () {
    
    console.log("Afficher les categories")
    afficherCategories();
});


