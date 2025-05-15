let table; // accessible pour les handlers
let isNew = false;
let id_type = 10;
let nb = 10;

function removeQuestion(id) {
    console.log("remove question " + id);
    $.post('../Controleurs/controleurs.php',
            {commande: 'supprimerQuestion',
                'id': id}
    )
            .done(function (ret, stat, xhr) {
                console.log("remove question " + id);
            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}

function saveQuestion() {
    const id = $('#editId').val();
    const id_type = $('#editId_type').val();
    const intitule = $('#editIntitule').val();
    const reponse = $('#editReponse').val();


    // Requête Ajax vers le controleur
    if (isNew) {
        $.post('../Controleurs/controleurs.php',
                {
                    'commande': 'creerQuestion',
                    'id_type': id_type,
                    'intitule': intitule,
                    'reponse': reponse
                }
        ).done(function (data, stat, xhr) {

            console.log(data);
            table.row.add({
                id: data,
                id_type: id_type,
                intitule: intitule,
                reponse: reponse
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
                    'commande': 'updateQuestion',
                    'id': id,
                    'id_type': id_type,
                    'intitule': intitule,
                    'reponse': reponse,
                }
        ).done(function (ret, stat, xhr) {

            console.log(ret);
            if (ret === true) {
                // Mise à jour de la ligne du datatable
                const row = $('#editModal').data('rowRef');
                row.data({
                    id: parseInt(id),
                    id_type: id_type,
                    intitule: intitule,
                    reponse: reponse,
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

function afficherQuestions() {

    $.post('../Controleurs/controleurs.php',
            {
                'commande': 'obtenirQuestions',
                'type': id_type,
                'nb': nb
            }
    )
            .done(function (questions, stat, xhr) {

                console.log(questions);

                table = $('#questions').DataTable({
                    data: questions,
                    columns: [
                        {data: 'id', visible: false, searchable: false},
                        {data: 'id_type', visible: false, searchable: false},
                        {data: 'intitule'},
                        {data: 'reponse'},
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
                $('#questions tbody').on('click', '.delete-btn', function () {
                    const row = table.row($(this).parents('tr'));
                    const rowData = row.data();
                    if (confirm(`Supprimer "${rowData.intitule}" ?`)) {
                        removeQuestion(rowData.id);

                        row.remove().draw();
                    }
                });

                // Action sur le bouton "Éditer"
                $('#questions tbody').on('click', '.edit-btn', function () {
                    const row = table.row($(this).parents('tr'));
                    const data = row.data();
                    $(".modal-title").text("Editer une question");
                    $('#editId').val(data.id);
                    $('#editId_type').val(data.id_type);
                    $('#editIntitule').val(data.intitule);
                    $('#editReponse').val(data.reponse);

                    $('#editModal').show().data('rowRef', row);
                });
            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}

function addQuestion() {
    isNew = true;
    
    $(".modal-title").text("Ajouter une question");
    // Vide les champs de la modale
    $('#editId').val('');
    $('#editId_type').val('');
    $('#editIntitule').val('');
    $('#editReponse').val('');

    $('#editModal').show().removeData('rowRef');

}


$(document).ready(function () {

    isNew = false;
    afficherQuestions(id_type);
    $('#btnAddNew').on('click', addQuestion);
    $('#saveEdit').on('click', saveQuestion);

});


