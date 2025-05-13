let table; // accessible pour les handlers

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
                        row.remove().draw();
                    }
                });

                // Action sur le bouton "Éditer"
                $('#categories tbody').on('click', '.edit-btn', function () {
                    const row = table.row($(this).parents('tr'));
                    const data = row.data();

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
    
    // A compléter requête Ajax vers le controleur

    const row = $('#editModal').data('rowRef');
    
    row.data({
        id: parseInt(id),
        nom_type: nom,
        description: desc
    }).draw(false);
    
    $('#editModal').hide();
}



$(document).ready(function () {

    console.log("Afficher les categories")
    afficherCategories();
    $('#saveEdit').on('click', saveCategorie);

});


