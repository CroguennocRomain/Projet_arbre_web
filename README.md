# Projet_arbre_web

Aperçu de l'arborescence : 

    Groupe 14 :

        - css_files (dossier contenant tous nos fichiers .css avec un fichier par page html)
            - accueil.css (fichier.css pour le style de la page accueil.html)
            - age_arbre.css (fichier.css pour le style de la page age_arbre.html)
            - ajout_arbre.css (fichier.css pour le style de la page ajout_arbre.html)
            - arbre_BDD.css (fichier.css pour le style de la page visual_arbre_BDD.html)
            - authentification.css (fichier.css pour le style de la page authentification.html)
            - taille_arbre.css (fichier.css pour le style de la page taille_arbre.html)
            - tempete_arbre.css (fichier.css pour le style de la page tempete_arbre.html)
        - html_files (dossier contenant tous nos fichiers .html)
            - accueil.html (fichier.html pour la page d'accueil)
            - age_arbre.html (fichier.html pour la page de prédiction des ages)
            - ajout_arbre.html (fichier.html pour la page d'ajout d'un arbre)
            - visual_arbre_BDD.html (fichier.html pour la page de visualisation des arbres de la bdd)
            - authentification.html (fichier.html pour la page d'authentification)
            - taille_arbre.html (fichier.html pour la page de prédiction des des clusters)
            - tempete_arbre.html (fichier.html pour la page de prédiction des tempêtes)
        - js_files (dossier contenant tous nos fichiers .js)
            - ajax.js (fichier .js pour les fonctions ajaxRequest et httpErrors)
            - filtres.js (fichier .js pour les filtres de la page de visualisation des arbres)
            - map.js (fichier .js servant à former les 3 maps du site)
            - request.js (fichier .js contenant toutes nos requetes ajax en fonction des actions de l'utilisateur)
        - php_files (dossier contenant tous nos fichiers .php)
            - constants.php (fichier .php définissant les informations de la bdd et du serveur)
            - database.php (fichier .php permettant d)
            - test_request.php (fichier .php contenant toutes nos requetes php du site)
        - sql_files (dossier contenant tous nos fichiers .sql)
            - createDatabase.sql (fichier .sql permettant de partir d'une base vierge avec les bonnes tables)
            - demo.sql (fichier .sql pour avoir une base spécifique pour la démonstration)
            - insertData.sql (fichier .sql pour remplir la database avec nos données)
        - py_files (dossier contenant tout nos fichier lié à notre python)
            - JSON (dossier avec nos sortie de l'exécutions des scripts python)
                    - script1_result.json
                    - script2_result.json
                    - script3_result.json
            - models (dossier contenant tout nos fichiers .pkl pour les models de prédictions)
                - age_neigh.pkl
                - age_SGD.pkl
                - age_SVM.pkl
                - age_tree.pkl
                - knn_model.pkl
                - rf_model.pkl
                - svm_model.pkl
            - OrdinalEncoder (dossier contenant nos fichier .pkl pour les différents encoder)
                - ordinal_encoder1.pkl
                - ordinal_encoder2.pkl
                - ordinal_encoder3.pkl
            - Scaler (dossier contenant nos fichier .pkl pour les différentes normalisations)
                - scaler1.pkl
                - scaler2.pkl
                - scaler3.pkl
            - centroids.csv
            - centroids2.csv
            - Data_Arbre.csv
            - script_fonc1.py
            - script_fonc2.py
            - script_fonc3.py
        - arbres.csv
        - clusters.csv
        - clusters2.csv
        - panorama_art.jpg
        - README.md
            

---------------------------------------------------------------------------------------------------------------------------------

Afin de pouvoir faire fonctionner le code sur votre environnement, vous devez réaliser les étapes suivantes :

    - Si vous êtes sur la machine virtuelle, vous devez d'abord vous assurez que vous avez lancé apache2 et postgresql avec les commande suivante dans votre terminal :
        - sudo service apache2 restart
        - sudo service postgresql restart

        Puis vous devez vous assurez que les fichiers arbres.csv, clusters.csv et clusters2.csv appartient au propriétaire 'www-data' avec la commande :  
            - ls -all /var/www/html/Projet_arbre_web/

        Si ce n'est pas le cas, exécutez ces commande puis revérifier avec la commande précedente que le changement a bien été fait :
            - sudo chown www-data /var/www/html/Projet_arbre_web/arbres.csv
            - sudo chown www-data /var/www/html/Projet_arbre_web/clusters.csv
            - sudo chown www-data /var/www/html/Projet_arbre_web/clusters2.csv
        
        Puis vous devez vous assurez que les fichiers script1_result.json, script2_result.json et script3_result.json appartient au propriétaire 'www-data' avec la commande :  
            - ls -all /var/www/html/Projet_arbre_web/py_files/JSON/

        Si ce n'est pas le cas, exécutez cette commande puis revérifier avec la commande précedente que le changement a bien été fait :
            - sudo chown www-data /var/www/html/Projet_arbre_web/py_files/JSON/ -R
        


    - Si vous êtes sur votre propre environnement, vous devez exécuter les commande suivante et vous assurez que les changements ont bien été fait :
