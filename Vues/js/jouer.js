function afficherCategories() {
    $.post('../Controleurs/controleurs.php',
            {
                'commande': 'obtenirCategories'
            }
    )
            .done(function (data, stat, xhr) {
                //$("#adresse").text(donnees.adresse);
                console.log(data);
                const grille = document.getElementById('grille');

                data.forEach(item => {
                    
                    const encodedType = encodeURIComponent(item.nom_type);
                    const url = `question.php?type=${encodedType}&id=${item.id}`;
                    
                    const col = document.createElement('div');
                    col.className = 'col-12 col-sm-6 col-lg-4 mb-4';

                    col.innerHTML = `
                                    <a href="${url}" class="text-decoration-none text-dark">                    
                                    <div class="card h-100 shadow-sm card-hover">
                                      <div class="card-body">
                                        <h5 class="card-title">${item.nom_type}</h5>
                                        <p class="card-text">${item.description}</p>
                                      </div>
                                    </div></a>
                                    `;

                    grille.appendChild(col);
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

