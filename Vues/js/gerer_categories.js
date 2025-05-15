let table; // accessible pour les handlers
let isNew = false;

function removeCategorie(id) {

    console.log("Remove catagorie : " + id);
    $.post('../Controleurs/controleurs.php',
            {commande: 'supprimerCategories',
                'id': id}
    )
            .done(function (categories, stat, xhr) {

            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}

function afficherCategories() {

    $.post('../Controleurs/controleurs.php',
            {commande: 'obtenirCategories'}
    )
            .done(function (categories, stat, xhr) {

                console.log(categories);

                table = $('#categories').DataTable({
                    data: categories,
                    columns: [
                        {data: 'id', visible: false, searchable: false},
                        {data: 'nom_type'},
                        {data: 'description'},
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `<button class="btn-icon edit-btn" title="Éditer" data-id="${row.id}"><i class="fas fa-pen"></i></button>`;
                                ;
                            },
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `<button class="btn-icon delete-btn" title="Supprimer" data-id="${row.id}"><i class="fas fa-trash"></i></button>`;
                            },
                            orderable: false,
                            searchable: false
                        }
                    ],

                    language: {url: './js/datatables_fr-FR.json'}
                });

                // Action sur le bouton "Supprimer"
                $('#categories tbody').on('click', '.delete-btn', function () {
                    const row = table.row($(this).parents('tr'));
                    const rowData = row.data();
                    if (confirm(`Supprimer "${rowData.nom_type}" ?`)) {
                        removeCategorie(rowData.id);

                        row.remove().draw();
                    }
                });

                // Action sur le bouton "Éditer"
                $('#categories tbody').on('click', '.edit-btn', function () {
                    const row = table.row($(this).parents('tr'));
                    const data = row.data();
                    $(".modal-title").text("Modifier une catégorie");
                    $('#editId').val(data.id);
                    $('#editNom').val(data.nom_type);
                    $('#editDescription').val(data.description);

                    $('#editModal').show().data('rowRef', row);
                });
            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}

function saveCategorie() {
    const id = $('#editId').val();
    const nom = $('#editNom').val();
    const desc = $('#editDescription').val();

    // Requête Ajax vers le controleur
    if (isNew) {
        $.post('../Controleurs/controleurs.php',
                {
                    'commande': 'creerCategories',
                    'nom': nom,
                    'description': desc
                }
        ).done(function (reponse, stat, xhr) {

            console.log(reponse);
            table.row.add({
                id: reponse,
                nom_type: nom,
                description: desc
            }).draw(false);
            $('#editModal').hide();

        }).fail(function (xhr, text, error) {
            console.log("param : " + JSON.stringify(xhr));
            console.log("status : " + text);
            console.log("error : " + error);

        });

        isNew = false;
    } else {

        $.post('../Controleurs/controleurs.php',
                {
                    'commande': 'updateCategories',
                    'id': id,
                    'nom': nom,
                    'description': desc
                }
        ).done(function (reponse, stat, xhr) {

            console.log(reponse);
            if (reponse === true) {
                // Mise à jour de la ligne du datatable
                const row = $('#editModal').data('rowRef');
                row.data({
                    id: parseInt(id),
                    nom_type: nom,
                    description: desc
                }).draw(false);

                $('#editModal').hide();
            }

        }).fail(function (xhr, text, error) {
            console.log("param : " + JSON.stringify(xhr));
            console.log("status : " + text);
            console.log("error : " + error);

        });

    }
}

function addCategorie() {
    isNew = true;
    $(".modal-title").text("Ajouter une catégorie");
    // Vide les champs de la modale
    $('#editId').val('');
    $('#editNom').val('');
    $('#editDescription').val('');

    $('#editModal').show().removeData('rowRef');

}



$(document).ready(function () {

    isNew = false;
    afficherCategories();
    $('#saveEdit').on('click', saveCategorie);
    $('#btnAddNew').on('click', addCategorie);
});


