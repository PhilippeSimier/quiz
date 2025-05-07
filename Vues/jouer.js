function afficherCategories() {
    $.post('../Controleurs/controleurs.php',
            {
                'commande': 'obtenirCategories'
            }
    )
            .done(function (data, stat, xhr) {
                //$("#adresse").text(donnees.adresse);
                console.log(data);
                
                
                $.each(data, function (index, item) {
                    
                    var encodedType = encodeURIComponent(item.nom_type);
                    var bloc = $('<div>', {class: 'categorie', id: 'cat-' + item.id})
                            .append(
                                    $('<h3>').append(
                                    $('<a>', {
                                        href: 'question.php?type=' + encodedType + '&id=' +item.id,
                                        text: item.nom_type
                                    })
                                    )
                                    )
                            .append($('<p>').text(item.description));

                    $('#categories').append(bloc);
                });


            })
            .fail(function (xhr, text, error) {
                console.log("param : " + JSON.stringify(xhr));
                console.log("status : " + text);
                console.log("error : " + error);
            });
}


$(document).ready(function ()
{
    console.log("Jouer au Quizz");
    
    afficherCategories();


});

