SELECT a.haut_tot, a.haut_tronc, a.id, a.latitude, a.longitude, s.stadedev, n.nomtech, f.feuillage 
FROM arbre a
JOIN fk_stadedev s on s.id_stadedev = a.id_stadedev
JOIN fk_nomtech n on n.id_nomtech = a.id_nomtech
JOIN feuillage f on f.id_feuillage = a.id_feuillage