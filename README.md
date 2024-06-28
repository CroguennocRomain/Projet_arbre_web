# Projet_arbre_web

Aperçu de l'arborescence : 

    Groupe 14 :

        - css_files (dossier contenant tous nos fichier.css avec un fichier par page html)
            - accueil.css (fichier.css pour le style de la page accueil.html)
            - age_arbre.css (fichier.css pour le style de la page age_arbre.html)
            - ajout_arbre.css (fichier.css pour le style de la page ajout_arbre.html)
            - arbre_BDD.css (fichier.css pour le style de la page visual_arbre_BDD.html)
            - authentification.css (fichier.css pour le style de la page authentification.html)
            - taille_arbre.css (fichier.css pour le style de la page taille_arbre.html)
            - tempete_arbre.css (fichier.css pour le style de la page tempete_arbre.html)

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
