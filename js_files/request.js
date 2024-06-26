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
          window.location.href = "../html_files/accueil.html";
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
        cluster_pred,
    );
})

function cluster_pred(data){}