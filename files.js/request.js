'use strict';

$('#arbres').click(() => {
    ajaxRequest('GET', '../files.php/request.php/arbres', displayArbres);
});



function displayArtistes(artistes){
    let corps = document.getElementById("corps");
    let recherche = document.getElementById("input-search").value.toLowerCase();
    let chaine = "";
    for (let artiste of artistes){
        let nom = artiste["nom"];
        let id_artiste = artiste["id_artiste"];
        if(nom.toLowerCase().includes(recherche)) {
            chaine += '<button id="artiste' + id_artiste + '" type="button" onClick="btnDetailsArtiste(\'' + id_artiste + '\')">';
            chaine += nom;
            chaine += '</button>';
        }
    }
    corps.innerHTML = chaine;
}