'use strict';

$('#btn_add_tree').click(() => {
    ajaxRequest('GET', '../files.php/request.php/arbres', displayArbres);
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
    '../php/request.php/ajouter_arbre',
    ajouter_arbre,
    'haut_tot='+haut_tot+'&haut_tronc='+haut_tronc+'&tronc_diam='+tronc_diam+'&fk_nomtech='+fk_nomtech+'&feuillage='+feuillage+'&mdp_conf='+mdp_conf
);
})