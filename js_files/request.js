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


if((!isNaN(parseFloat(haut_tot)) && isFinite(haut_tot)) && (!isNaN(parseFloat(haut_tronc)) && isFinite(haut_tronc)) && (!isNaN(parseFloat(tronc_diam)) && isFinite(tronc_diam)) && (!isNaN(parseFloat(latitude)) && isFinite(latitude)) && (!isNaN(parseFloat(longitude)) && isFinite(longitude))){
    console.log('YUI');
    ajaxRequest(
        'POST',
        '../php_files/test_request.php/ajouter_arbre',
        ajouter_arbre,
        'haut_tot='+haut_tot+'&haut_tronc='+haut_tronc+'&tronc_diam='+tronc_diam+'&fk_nomtech='+fk_nomtech+'&feuillage='+feuillage+'&fk_stadedev='+fk_stadedev+'&latitude='+latitude+'&longitude='+longitude+'&clc_secteur='+clc_secteur+'&fk_port='+fk_port+'&fk_revetement='+fk_revetement
    );
}

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

$('#bouton_cluster_pred').on("click", () => {
    let id = $('#ligne_value').val();

    if(!(id === null || id === undefined || id.trim() === '')){
        ajaxRequest(
            'GET',
            '../php_files/test_request.php/cluster_pred',
            cluster_pred,
            'id='+id
        );
    }
})
$('#bouton_age_pred').on("click", () => {
    let id = $('#ligne_value').val();

    if(!(id === null || id === undefined || id.trim() === '')){
        ajaxRequest(
            'GET',
            '../php_files/test_request.php/age_pred',
            age_pred,
            'id='+id
        );
    }
})
$('#bouton_tempete_pred').on("click", () => {
    let id = $('#ligne_value').val();

    if(!(id === null || id === undefined || id.trim() === '')){
        ajaxRequest(
            'GET',
            '../php_files/test_request.php/tempete_pred',
            tempete_pred,
            'id='+id
        );
    }
})

$('#bouton_valider').on("click", () => {
    let username = $('#username').val();
    let password = $('#password').val();
    ajaxRequest(
        'POST',
        '../php_files/test_request.php/login',
        login,
        'username='+username+'&password='+password
    );
    
})

function cluster_pred(data){
    data = JSON.parse(data);
    console.log(data);
    // Construire l'URL avec les données en tant que paramètres de requête GET
    //var queryString = "?data=" + encodeURIComponent(JSON.stringify(data));
    //window.location.href = "taille_arbre.html" + queryString;
}
function age_pred(data){
    data = JSON.parse(data);
    console.log(data);
    // Construire l'URL avec les données en tant que paramètres de requête GET
    var queryString = "?data=" + encodeURIComponent(JSON.stringify(data));
    window.location.href = "age_arbre.html" + queryString;
}

function tempete_pred(data){
    data = JSON.parse(data);
    console.log(data);
    // Construire l'URL avec les données en tant que paramètres de requête GET
    var queryString = "?data=" + encodeURIComponent(JSON.stringify(data));
    window.location.href = "tempete_arbre.html" + queryString;
}

function login(data){
    console.log(data);
    switch(data){
        case "identifiants corrects":
            window.location.href = "ajout_arbre.html";
            break;
    }
        

    
}

// Requête afficher arbres dans tableau

let url = window.location.pathname;
let segments = url.split("/");
//quand on est sur la page visualisation
if (segments[3] == 'visual_arbre_BDD.html')
{
    
    ajaxRequest(
        'GET',
        '../php_files/test_request.php/afficher_arbres',
        afficher_all_arbres
    );
}
if (segments[3] == 'age_arbre.html')
{
    var dataString = getQueryVariable('data');
    if (dataString) {
        var data = JSON.parse(dataString);
        
        // Manipuler les éléments dans la page
        var id_arbre = document.getElementById('id_arbre');
        id_arbre.innerHTML += data[0];
        var model_0 = document.getElementById('model_0');
        model_0.innerHTML += data[1];
        var model_1 = document.getElementById('model_1');
        model_1.innerHTML += data[2];
        var model_2 = document.getElementById('model_2');
        model_2.innerHTML += data[3];
        var model_3 = document.getElementById('model_3');
        model_3.innerHTML += data[4];
        
        // Ajouter d'autres manipulations si nécessaire
    }
}
if (segments[3] == 'tempete_arbre.html')
    {
        var dataString = getQueryVariable('data');
        if (dataString) {
            var data = JSON.parse(dataString);
            
            // Manipuler les éléments dans la page
            var id_arbre = document.getElementById('id_arbre');
            id_arbre.innerHTML += data[0]+' v';
            var model_0 = document.getElementById('model_0');
            model_0.innerHTML += data[1];
            var model_1 = document.getElementById('model_1');
            model_1.innerHTML += data[2];
            var model_2 = document.getElementById('model_2');
            model_2.innerHTML += data[3];
            
            // Ajouter d'autres manipulations si nécessaire
        }
    }
if (segments[3] == 'ajout_arbre.html')
{
    if (sessionStorage.getItem('username')) {
        ajaxRequest(
            'GET',
            '../php_files/test_request.php/afficher_all_variable',
            afficher_all_variables
        );
    }
    else{
        window.location.href = "authentification.html";
    
    }
}

console.log(segments[3]);

function afficher_all_arbres(data){
    data = JSON.parse(data);

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

function afficher_all_variables(data) {
    data = JSON.parse(data);
    console.log(data);
    var nom_colonne = ['fk_nomtech','feuillage','fk_stadedev','clc_secteur','fk_port','fk_revetement']

    // Parcourir chaque colonne dans les données
    Object.keys(data).forEach((colonne) => {
        console.log(nom_colonne[colonne]);
        var selectElement = document.getElementById(nom_colonne[colonne]); // Utiliser la clé comme ID
        var html = '';
        
        // Parcourir chaque valeur dans la colonne
        data[colonne].forEach((value) => {
            console.log(value);
            html += '<option value="' + value + '">' + value + '</option>';
        });
        console.log(html);
        // Mettre à jour le contenu HTML de l'élément select
        selectElement.innerHTML = html;
    });
}




// Fonction pour récupérer les paramètres de requête GET depuis l'URL
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] === variable) {
            return decodeURIComponent(pair[1]);
        }
    }
    return null;
}
