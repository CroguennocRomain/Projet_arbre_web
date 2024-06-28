# Projet Web - Groupe 14

**Lien de notre dépot Git :** "https://github.com/CroguennocRomain/Projet_arbre_web.git"

**Addresse de notre machine virtuelle :** 10.30.51.133
**Mot de passe de la machine virtuelle :** vm_web


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
            - visual_arbre_BDD.html         (fichier.html pour la page de visualisation des arbres de la base de donnée)
            - authentification.html         (fichier.html pour la page d'authentification)
            - taille_arbre.html             (fichier.html pour la page de prédiction des clusters)
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
            - centroids.csv         (centroids utilisés pour l'exécution du script de prédiction de clusters-taille ; modèle K-means)
            - centroids2.csv        (centroids utilisés pour l'exécution du script de prédiction de clusters-taille ; modèle Agglomerative Clustering)
            - Data_Arbre.csv        (tableau de données initial contenant 7409 arbres)
            - script_fonc1.py       (script python pour la prédiction de la clusters-taille)
            - script_fonc2.py       (script python pour la prédiction de l'âge)
            - script_fonc3.py       (script python pour la prédiction du déracinement)
        - arbres.csv        (tableau des arbres stockés dans la base de données)
        - clusters.csv      (clusters utilisés pour l'affichage sur carte du modèle K-means)
        - clusters2.csv     (clusters utilisés pour l'affichage sur carte du modèle Agglomerative Clustering)
        - panorama_art.jpg  (image de la page d'accueil)
        - README.md         (notice explicative de l'application web)
            

---------------------------------------------------------------------------------------------------------------------------------

### déployer le site sur un environnement

**Installation de apache2 :**
```bash
sudo apt-get install apache2
sudo service apache2 start

sudo apt install php libapache2-mod-php

#(changez username par le vôtre, qui est avant "@" dans votre terminal)
sudo chown -R username .

sudo service apache2 restart
```

**!!!** Vous devez tout d'abord copier le dossier **Projet_arbre_web** à l'emplacement **/var/www/html**

**Installation de postgreSQL :**
```bash
sudo apt-get update
sudo apt-get install postgresql
sudo apt-get install php-pgsql
sudo service postgresql start

sudo -u postgres psql
```
```postgresql
create database projet_web_arbres;
ALTER USER postgres WITH PASSWORD 'isen44';
\q
```

```bash
sudo service postgresql restart
```

**Installation de python et de ses package grâce à venv :**
```bash
cd /var/www/html
sudo mkdir venv

cd /var/www/html/venv
sudo apt-get install python3-venv
python3 -m venv myenv

cd /var/www/html/venv
source myenv/bin/activate

cd /var/www/html/venv/myenv/bin
pip install numpy pandas scikit-learn
```

**Changer le propriétaire des fichiers :**
```bash
sudo chown www-data /var/www/html/Projet_arbre_web/arbres.csv
sudo chown www-data /var/www/html/Projet_arbre_web/clusters.csv
sudo chown www-data /var/www/html/Projet_arbre_web/clusters2.csv

sudo chmod 777 /var/www/html/Projet_arbre_web/arbres.csv
sudo chmod 777 /var/www/html/Projet_arbre_web/clusters.csv
sudo chmod 777 /var/www/html/Projet_arbre_web/clusters2.csv

sudo chown www-data /var/www/html/Projet_arbre_web/py_files/JSON/ -R
sudo chmod 777 /var/www/html/Projet_arbre_web/py_files/JSON/ -R
```

**Paramétrer la base de données :**
```bash
sudo -u postgres psql
```
```postgresql
\connect projet_web_arbres
\i /var/www/html/Projet_arbre_web/sql_files/createDatabase.sql
\i /var/www/html/Projet_arbre_web/sql_files/insertData.sql
\i /var/www/html/Projet_arbre_web/sql_files/demo.sql
\q
```

**Si vous voulez mettre le site sur une machine virtuelle :**

Copier toutes les commande ci-dessus en ssh :

```bash
#(changez username par le vôtre, qui est avant "@" dans votre terminal et '10.30.51.133' par l'ip de la machine virtuelle)
ssh username@10.30.51.133
```

**Copier le dossier 'Projet_arbre_web' sur la machine virtuelle (10.30.51.133) :**
```bash
#(changez chemin/vers/ par le chemin vers votre dossier Projet_arbre_web sur votre machine locale)
sudo scp -r chemin/vers/Projet_arbre_web isen@10.30.51.133:/var/www/html
```

**Pour atterrir directement sur la page d'accueil du site, tapez cette URL :**

    http://10.30.51.133/Projet_arbre_web/html_files/accueil.html


**Pour l'authentification :**
Vous pouvez vous connecter avec ces utilisateurs : **test1**, **test2** ou **test3**
Pour chaque utilisateur, entrez le mot de passe : **test**


