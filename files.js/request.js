'use strict';

$('#btn_add_tree').click(() => {
    ajaxRequest('GET', '../files.php/request.php/arbres', displayArbres);
});


// Fonctions d'affichage
function displayArbres(){
    document.getElementsByClassName("test").innerHTML = "OK";
}