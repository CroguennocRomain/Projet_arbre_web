function normalizeString(str) {
    return str.normalize('NFD').replace(/[\u0300-\u036f]/g, '').trim().toLowerCase();
}


function applyFilters() {
    var filterLatitude = normalizeString(document.getElementById('filter-latitude').value);
    var filterLongitude = normalizeString(document.getElementById('filter-longitude').value);
    var filterSecteur = normalizeString(document.getElementById('filter-secteur').value);
    var filterHautTot = normalizeString(document.getElementById('filter-haut_tot').value);
    var filterHautTronc = normalizeString(document.getElementById('filter-haut_tronc').value);
    var filterRevetement = normalizeString(document.getElementById('filter-revetement').value);
    var filterDiametre = normalizeString(document.getElementById('filter-diametre').value);
    var filterStadeDev = normalizeString(document.getElementById('filter-stadedev').value);
    var filterNom = normalizeString(document.getElementById('filter-nom').value);
    var filterPort = normalizeString(document.getElementById('filter-port').value);
    var filterFeuillage = normalizeString(document.getElementById('filter-feuillage').value);

    var tableRows = document.querySelectorAll('#table-body tr');

    tableRows.forEach(function(row) {
        var latitude = normalizeString(row.cells[1].textContent);
        var longitude = normalizeString(row.cells[2].textContent);
        var secteur = normalizeString(row.cells[3].textContent);
        var haut_tot = normalizeString(row.cells[4].textContent);
        var haut_tronc = normalizeString(row.cells[5].textContent);
        var revetement = normalizeString(row.cells[6].textContent);
        var diametre = normalizeString(row.cells[7].textContent);
        var stadedev = normalizeString(row.cells[8].textContent);
        var nom = normalizeString(row.cells[9].textContent);
        var port = normalizeString(row.cells[10].textContent);
        var feuillage = normalizeString(row.cells[11].textContent);

        var showRow = true; // reinitialiser showRow

        // si filtre latitude non vide et la ligne ne commence pas par la valeur du filtre
        if (filterLatitude && !latitude.startsWith(filterLatitude)) {
            showRow = false;  
        }
        if (filterLongitude && !longitude.startsWith(filterLongitude)) {
            showRow = false;
        }

        // secteur
        // si filtre secteur non vide et la ligne ne contient pas la valeur du filtre
        if (filterSecteur && secteur.indexOf(filterSecteur) === -1) {
            showRow = false;
        }

        // hauteur totale
        if (filterHautTot && haut_tot !== filterHautTot) {
            showRow = false;  
        }
        // hauteur tronc
        if (filterHautTronc && haut_tronc !== filterHautTronc) {
            showRow = false;
        }

        // revetement
        if (revetement !== filterRevetement && filterRevetement !== 'tous') {
            showRow = false;
        }

        // diametre tronc
        if (filterDiametre && diametre !== filterDiametre) {
            showRow = false;  
        }

        // stade dev
        // si stadedev de la ligne different de stadedev du filtre et si filtre selectionne n'est pas 'Tous'
        if (stadedev !== filterStadeDev && filterStadeDev !== 'tous') {
            showRow = false;
        }

        // nom
        if (filterNom && !nom.startsWith(filterNom)) {
            showRow = false;
        }
        // port
        if (filterPort && !port.startsWith(filterPort)) {
            showRow = false;
        }

        // feuillage
        if (feuillage !== filterFeuillage && filterFeuillage !== 'tous') {
            showRow = false;
        }


        // Masquer la ligne si showRow is false
        row.style.display = showRow ? '' : 'none';
    });
}
