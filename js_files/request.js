'use strict';

$('#btn_add_tree').click(() => {
    ajaxRequest('GET', '../php_files/request.php/arbres', displayArbres);
});


// Fonctions d'affichage
function displayArbres(){
    document.getElementsByClassName("test").innerHTML = "OK";
}



  
$('#bouton_ajout_arbre').on("click", () => {
let haut_tot = $('#haut_tot').val();
let haut_tronc = $('#haut_tronc').val();
let tronc_diam = $('#tronc_diam').val();
let fk_nomtech = $('#fk_nomtech').val();
let feuillage = $('#feuillage').val();
let fk_stadedev = $('#fk_stadedev').val();
let latitude = $('#latitude').val();
let longitude = $('#longitude').val();
let clc_secteur = $('#clc_secteur').val();
let fk_port = $('#fk_port').val();
let fk_revetement = $('#fk_revetement').val();

ajaxRequest(
    'POST',
    '../php_files/test_request.php/ajouter_arbre',
    ajouter_arbre,
    'haut_tot='+haut_tot+'&haut_tronc='+haut_tronc+'&tronc_diam='+tronc_diam+'&fk_nomtech='+fk_nomtech+'&feuillage='+feuillage+'&fk_stadedev='+fk_stadedev+'&latitude='+latitude+'&longitude='+longitude+'&clc_secteur='+clc_secteur+'&fk_port='+fk_port+'&fk_revetement='+fk_revetement
);
})

function ajouter_arbre(data)
{
  switch (data){
      case 'arbre_ajouté':
          window.location.href = "../html_files/visual_arbre_BDD.html";
          break;
      case 'arbre_non_ajouté':
          $('#alert-erreur-connexion').toggleClass('d-none');
          break;
  }
}

$('#bouton_ajout_csv').on("click", () => {
    
    ajaxRequest(
        'POST',
        '../php_files/test_request.php/add_database_csv',
        ajouter_arbre,
    );
})

$('#bouton_ajout_csv').on("click", () => {
    
    ajaxRequest(
        'GET',
        '../php_files/test_request.php/cluster_pred',
        cluster_pred,'id='+id
    );
})

function cluster_pred(data){}


// Requête afficher arbres dans tableau

let url = window.location.pathname;
let segments = url.split("/");
//quand on est sur la page visualisation
if (segments[3] == 'visual_arbre_BDD.html'){
    ajaxRequest(
        'GET',
        '../php_files/test_request.php/afficher_arbres',
        afficher_all_arbres
    );
}

function afficher_all_arbres(data){
    data = JSON.parse(data);

    console.log(data)
    console.log(data[0]['haut_tot']);   //recup haut_tot de l'arbre d'id 1

    const tableBody = document.getElementById('table-body');
    let html = '';

    // Parcourir les données et construire les lignes du tableau
    data.forEach((arbre) => {
        html += `<tr>
                    <td>${arbre.id}</td>
                    <td>${arbre.latitude}</td>
                    <td>${arbre.longitude}</td>
                    <td>${arbre.secteur}</td>
                    <td>${arbre.haut_tot}</td>
                    <td>${arbre.haut_tronc}</td>
                    <td>${arbre.revetement}</td>
                    <td>${arbre.tronc_diam}</td>
                    <td>${arbre.stadedev}</td>
                    <td>${arbre.nomtech}</td>
                    <td>${arbre.port}</td>
                    <td>${arbre.feuillage}</td>
                </tr>`;
    });

    // Insérer les lignes générées dans le corps du tableau
    tableBody.innerHTML = html;

}
