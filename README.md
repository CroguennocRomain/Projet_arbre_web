# Projet Web - Groupe 14

### Aperçu de l'arborescence : 

        - css_files                     (dossier contenant tous nos fichiers .css avec un fichier par page html)
            - accueil.css                   (fichier.css pour le style de la page accueil.html)
            - age_arbre.css                 (fichier.css pour le style de la page age_arbre.html)
            - ajout_arbre.css               (fichier.css pour le style de la page ajout_arbre.html)
            - arbre_BDD.css                 (fichier.css pour le style de la page visual_arbre_BDD.html)
            - authentification.css          (fichier.css pour le style de la page authentification.html)
            - taille_arbre.css              (fichier.css pour le style de la page taille_arbre.html)
            - tempete_arbre.css             (fichier.css pour le style de la page tempete_arbre.html)
        - html_files                    (dossier contenant tous nos fichiers .html)
            - accueil.html                  (fichier.html pour la page d'accueil)
            - age_arbre.html                (fichier.html pour la page de prédiction des ages)
            - ajout_arbre.html              (fichier.html pour la page d'ajout d'un arbre)
            - visual_arbre_BDD.html         (fichier.html pour la page de visualisation des arbres de la bdd)
            - authentification.html         (fichier.html pour la page d'authentification)
            - taille_arbre.html             (fichier.html pour la page de prédiction des des clusters)
            - tempete_arbre.html            (fichier.html pour la page de prédiction des tempêtes)
        - js_files                      (dossier contenant tous nos fichiers .js)
            - ajax.js                       (fichier .js pour les fonctions ajaxRequest et httpErrors)
            - filtres.js                    (fichier .js pour les filtres de la page de visualisation des arbres)
            - map.js                        (fichier .js servant à former les 3 maps du site)
            - request.js                    (fichier .js contenant toutes nos requetes ajax en fonction des actions de l'utilisateur)
        - php_files                 (dossier contenant tous nos fichiers .php)
            - constants.php             (fichier .php définissant les informations de la bdd et du serveur)
            - database.php              (fichier .php permettant de se connecter à la base de données)
            - test_request.php          (fichier .php contenant toutes nos requetes php du site)
        - sql_files                 (dossier contenant tous nos fichiers .sql)
            - createDatabase.sql        (fichier .sql permettant de partir d'une base vierge avec les bonnes tables)
            - demo.sql                  (fichier .sql pour avoir une base spécifique pour la démonstration)
            - insertData.sql            (fichier .sql pour remplir la database avec nos données)
        - py_files                  (dossier contenant tous nos fichiers liés à python)
            - JSON                      (dossier avec nos sorties de l'exécution des scripts python)
                    - script1_result.json           (sortie du script de prédiction de la taille)
                    - script2_result.json           (sortie du script de prédiction de l'age)
                    - script3_result.json           (sortie du script de prédiction du déracinement)
            - models                (dossier contenant tous nos fichiers .pkl pour les modèles de prédiction)
                - age_neigh.pkl         (modèle K-Nearest Neighbors pour l'âge)
                - age_SGD.pkl           (modèle Stochastic Gradient Descent pour l'âge)
                - age_SVM.pkl           (modèle Support Vector Machines pour l'âge)
                - age_tree.pkl          (modèle DecisionTree pour l'âge)
                - knn_model.pkl         (modèle K-Nearest Neighbors pour le déracinement)
                - rf_model.pkl          (modèle Random Forest pour le déracinement)
                - svm_model.pkl         (modèle Support Vector Machines pour le déracinement)
            - OrdinalEncoder        (dossier contenant nos fichiers .pkl pour les différents encoders)
                - ordinal_encoder1.pkl          (encoder lié au script1)
                - ordinal_encoder2.pkl          (encoder lié au script2)
                - ordinal_encoder3.pkl          (encoder lié au script3)
            - Scaler                (dossier contenant nos fichiers .pkl pour les différentes normalisations)
                - scaler1.pkl                   (normalisation liée au script1)
                - scaler2.pkl                   (normalisation liée au script2)
                - scaler3.pkl                   (normalisation liée au script3)
            - centroids.csv         (centroids utilisés pour l'exécution du script de prédiction de taille)
            - centroids2.csv        (centroids utilisés pour l'exécution du script de prédiction de taille)
            - Data_Arbre.csv        (tableau de données initial contenant 7409 arbres)
            - script_fonc1.py       (script python pour la prédiction de la taille)
            - script_fonc2.py       (script python pour la prédiction de l'âge)
            - script_fonc3.py       (script python pour la prédiction du déracinement)
        - arbres.csv        (tableau des arbres stockés dans la base de données)
        - clusters.csv      (clusters utilisés pour l'affichage sur carte)
        - clusters2.csv     (clusters utilisés pour l'affichage sur carte)
        - panorama_art.jpg  (image de la page d'accueil)
        - README.md         (notice explicative de l'application web)
            

---------------------------------------------------------------------------------------------------------------------------------

### Ouverture du site

**Afin de faire fonctionner le code sur votre environnement, vous devez réaliser les étapes suivantes :**

Si vous êtes sur la machine virtuelle, vous devez d'abord vous assurer que vous avez lancé **apache2** et **postgresql** avec les commandes suivantes dans votre terminal :

    sudo service apache2 restart
    sudo service postgresql restart

Puis vous devez vous assurer que les fichiers **arbres.csv**, **clusters.csv** et **clusters2.csv** appartiennent au propriétaire **www-data** avec la commande :  
    
    ls -all /var/www/html/Projet_arbre_web/

Si ce n'est pas le cas, exécutez ces commandes puis revérifiez avec la commande précédente que le changement a bien été fait :
    
    sudo chown www-data /var/www/html/Projet_arbre_web/arbres.csv
    sudo chown www-data /var/www/html/Projet_arbre_web/clusters.csv
    sudo chown www-data /var/www/html/Projet_arbre_web/clusters2.csv
        
Puis vous devez vous assurer que les fichiers **script1_result.json**, **script2_result.json** et **script3_result.json** appartiennent au propriétaire **www-data** avec la commande :  

    ls -all /var/www/html/Projet_arbre_web/py_files/JSON/

Si ce n'est pas le cas, exécutez cette commande puis revérifier avec la commande précédente que le changement a bien été fait :

    sudo chown www-data /var/www/html/Projet_arbre_web/py_files/JSON/ -R

**Pour atterrir directement sur la page d'accueil du site, tapez cette URL :**

    http://10.30.51.133/Projet_arbre_web/html_files/accueil.html

**Pour l'authentification :**
Vous pouvez vous connecter avec ces utilisateurs : **test1**, **test2** ou **test3**
Pour chaque utilisateur, entrez le mot de passe : **test**


**Si vous êtes sur votre propre environnement, vous devez exécuter les commandes suivantes et vous assurer que les changements ont bien été fait :**
