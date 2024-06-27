<?php
#ini_set('display_errors',1);
#error_reporting(E_ALL);

#require_once 'add.php';
require_once 'database.php';


$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

switch ($requestRessource)
{
    case 'ajouter_arbre':
        ajouter_un_arbre($requestMethod);
        break;
    case 'add_database_csv':
        add_database_csv($requestMethod);
        break;
    case 'cluster_pred':
        cluster_pred($requestMethod);
        break;
    case 'afficher_arbres':
        afficher_arbres($requestMethod);
        break;
    case 'age_pred':
        age_pred($requestMethod);
        break;
    case 'tempete_pred':
        tempete_pred($requestMethod);
        break;
    case 'afficher_all_variable':
        afficher_all_variable($requestMethod);
        break;

}
function ajouter_arbre($requestMethod, float $longitude, float $latitude, float $haut_tot, float $haut_tronc, float $tronc_diam, string $clc_secteur, string $fk_stadedev, string $fk_port, string $fk_revetement, string $fk_nomtech, string $feuillage)
{
    switch ($requestMethod)
    {
        case 'POST':
            try {
                $db = dbConnect();
                
                // Table users
                /*
                $request = "
                INSERT INTO users(username, photo_playlist) VALUES 
                ('favoris', '/ressources/images/playlists_photo/favoris.png')
                RETURNING id_playlist;
                ";
                $statement = $db->prepare($request);
                $statement->execute();
                */
                $id_user = 1;

                
                // Table clc_secteur

                $request = "
                SELECT id_secteur FROM clc_secteur  
                WHERE secteur = :secteur
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':secteur', $clc_secteur);
                $statement->execute();

                $id_secteur = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id_secteur)) {
                    $request = "
                    INSERT INTO clc_secteur(secteur) 
                    VALUES (:secteur)
                    RETURNING id_secteur;
                    ";
                    $statement = $db->prepare($request);
                    $statement->bindParam(':secteur', $clc_secteur);
                    $statement->execute();

                    $id_secteur = $statement->fetch(PDO::FETCH_NUM)[0];
                }
                
                // Table fk_stadedev

                $request = "
                SELECT id_stadedev FROM fk_stadedev  
                WHERE stadedev = :stadedev
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':stadedev', $fk_stadedev);
                $statement->execute();

                $id_stadedev = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id_stadedev)) {
                    $request = "
                    INSERT INTO fk_stadedev(stadedev) 
                    VALUES (:stadedev)
                    RETURNING id_stadedev;
                    ";
                    $statement = $db->prepare($request);
                    $statement->bindParam(':stadedev', $fk_stadedev);
                    $statement->execute();
                    
                    $id_stadedev = $statement->fetch(PDO::FETCH_NUM)[0];
                }
                

                // Table fk_port

                $request = "
                SELECT id_port FROM fk_port  
                WHERE port = :port
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':port', $fk_port);
                $statement->execute();

                $id_port = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id_port)) {
                    $request = "
                    INSERT INTO fk_port(port) 
                    VALUES (:port)
                    RETURNING id_port;
                    ";
                    $statement = $db->prepare($request);
                    $statement->bindParam(':port', $fk_port);
                    $statement->execute();
                    
                    $id_port = $statement->fetch(PDO::FETCH_NUM)[0];
                }


                // Table fk_revetement

                $request = "
                SELECT id_revetement FROM fk_revetement  
                WHERE revetement = :revetement
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':revetement', $fk_revetement);
                $statement->execute();

                $id_revetement = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id_revetement)) {
                    $request = "
                    INSERT INTO fk_revetement(revetement) 
                    VALUES (:revetement)
                    RETURNING id_revetement;
                    ";
                    $statement = $db->prepare($request);
                    $statement->bindParam(':revetement', $fk_revetement);
                    $statement->execute();
                    
                    $id_revetement = $statement->fetch(PDO::FETCH_NUM)[0];
                }

        
                // Table fk_nomtech

                $request = "
                SELECT id_nomtech FROM fk_nomtech  
                WHERE nomtech = :nomtech
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':nomtech', $fk_nomtech);
                $statement->execute();

                $id_nomtech = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id_nomtech)) {
                    $request = "
                    INSERT INTO fk_nomtech(nomtech) 
                    VALUES (:nomtech)
                    RETURNING id_nomtech;
                    ";
                    $statement = $db->prepare($request);
                    $statement->bindParam(':nomtech', $fk_nomtech);
                    $statement->execute();
                    
                    $id_nomtech = $statement->fetch(PDO::FETCH_NUM)[0];
                }


                // Table feuillage

                $request = "
                SELECT id_feuillage FROM feuillage  
                WHERE feuillage = :feuillage
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':feuillage', $feuillage);
                $statement->execute();

                $id_feuillage = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id_feuillage)) {
                    $request = "
                    INSERT INTO feuillage(feuillage) 
                    VALUES (:feuillage)
                    RETURNING id_feuillage;
                    ";
                    $statement = $db->prepare($request);
                    $statement->bindParam(':feuillage', $feuillage);
                    $statement->execute();
                    
                    $id_feuillage = $statement->fetch(PDO::FETCH_NUM)[0];
                }
                

                // Table arbre

                $request = "
                SELECT id FROM arbre  
                WHERE (longitude = :longitude AND latitude = :latitude AND haut_tot = :haut_tot AND haut_tronc = :haut_tronc AND tronc_diam = :tronc_diam AND id_user = :id_user AND id_secteur = :id_secteur AND id_stadedev = :id_stadedev AND id_port = :id_port AND id_revetement = :id_revetement AND id_nomtech = :id_nomtech AND id_feuillage = :id_feuillage)
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':longitude', $longitude);
                $statement->bindParam(':latitude', $latitude);
                $statement->bindParam(':haut_tot', $haut_tot);
                $statement->bindParam(':haut_tronc', $haut_tronc);
                $statement->bindParam(':tronc_diam', $tronc_diam);
                $statement->bindParam(':id_user', $id_user);
                $statement->bindParam(':id_secteur', $id_secteur);
                $statement->bindParam(':id_stadedev', $id_stadedev);
                $statement->bindParam(':id_port', $id_port);
                $statement->bindParam(':id_revetement', $id_revetement);
                $statement->bindParam(':id_nomtech', $id_nomtech);
                $statement->bindParam(':id_feuillage', $id_feuillage);
                $statement->execute();

                $id = $statement->fetch(PDO::FETCH_NUM)[0];

                // Si la valeur n'existe pas, l'insérer et récupérer l'ID
                if (empty($id)) {
                    $request = "
                    INSERT INTO arbre (longitude, latitude, haut_tot, haut_tronc, tronc_diam, id_user, id_secteur, id_stadedev, id_port, id_revetement, id_nomtech, id_feuillage)
                    VALUES (:longitude, :latitude, :haut_tot, :haut_tronc, :tronc_diam, :id_user, :id_secteur, :id_stadedev, :id_port, :id_revetement, :id_nomtech, :id_feuillage)";
                    
                    $statement = $db->prepare($request);
                    $statement->bindParam(':longitude', $longitude);
                    $statement->bindParam(':latitude', $latitude);
                    $statement->bindParam(':haut_tot', $haut_tot);
                    $statement->bindParam(':haut_tronc', $haut_tronc);
                    $statement->bindParam(':tronc_diam', $tronc_diam);
                    $statement->bindParam(':id_user', $id_user);
                    $statement->bindParam(':id_secteur', $id_secteur);
                    $statement->bindParam(':id_stadedev', $id_stadedev);
                    $statement->bindParam(':id_port', $id_port);
                    $statement->bindParam(':id_revetement', $id_revetement);
                    $statement->bindParam(':id_nomtech', $id_nomtech);
                    $statement->bindParam(':id_feuillage', $id_feuillage);
                    
                    $statement->execute();

                    header('Content-Type: text/plain; charset=utf-8');
                    header('Cache-control: no-store, no-cache, must-revalidate');
                    header('Pragma: no-cache');
                    header('HTTP/1.1 200 OK');
                    echo "arbre_ajouté";
                }else{
                    echo "arbre_non_ajouté";
                }
                
            } catch (\Throwable $th) {
                echo 'arbre_non_ajouté';
                //echo ("Insertion failed: " . $e->getMessage());
            }
    }
}

function ajouter_un_arbre($requestMethod)
{
    if (!empty($_POST['haut_tot']) && !empty($_POST['haut_tronc']) && !empty($_POST['tronc_diam']) && !empty($_POST['fk_nomtech']) && !empty($_POST['feuillage']) && !empty($_POST['fk_stadedev']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['clc_secteur']) && !empty($_POST['fk_port']) && !empty($_POST['fk_revetement'])){
                    
        $latitude = floatval($_POST['latitude']);
        $longitude = floatval($_POST['longitude']);
        $haut_tot = floatval($_POST['haut_tot']);
        $haut_tronc = floatval($_POST['haut_tronc']);
        $tronc_diam = floatval($_POST['tronc_diam']);
        $fk_nomtech = $_POST['fk_nomtech'];
        $feuillage = $_POST['feuillage'];
        $fk_stadedev = $_POST['fk_stadedev'];
        $clc_secteur = $_POST['clc_secteur'];
        $fk_port = $_POST['fk_port'];
        $fk_revetement = $_POST['fk_revetement'];

        ajouter_arbre($requestMethod, $longitude, $latitude, $haut_tot, $haut_tronc, $tronc_diam, $clc_secteur, $fk_stadedev, $fk_port, $fk_revetement, $fk_nomtech, $feuillage);
    }else {
        //header('HTTP/1.1 400 Bad Request');
        echo 'arbre_non_ajouté';
    }
    exit();        
    
}

function add_database_csv($requestMethod)
{
    switch ($requestMethod)
    {
        case 'POST':
        try {
            
            
            // Lire le fichier CSV
            $file = fopen('../py_files/Data_Arbre.csv', 'r');
            if ($file === false) {
                echo "arbre_non_ajouté";
                exit();
            }

            // Ignorer la première ligne (en-têtes)
            fgetcsv($file);
            $i = 1;
            // Traiter chaque ligne du fichier CSV
            while (($row = fgetcsv($file)) !== false) {
                // Extraire les données pertinentes
                list($longitude, $latitude, $clc_quartier, $clc_secteur, $haut_tot, $haut_tronc, $tronc_diam, $fk_arb_etat, $fk_stadedev, $fk_port, $fk_pied, $fk_situation, $fk_revetement, $age_estim, $fk_prec_estim, $clc_nbr_diag, $fk_nomtech, $villeca, $feuillage, $remarquable) = $row;
                ajouter_arbre($requestMethod, $longitude, $latitude, $haut_tot, $haut_tronc, $tronc_diam, $clc_secteur, $fk_stadedev, $fk_port, $fk_revetement, $fk_nomtech, $feuillage);
                echo $i.' ';
                $i = $i +1;
            }

        } catch (\Throwable $th) {
            echo 'arbre_non_ajouté';
            //echo ("Insertion failed: " . $e->getMessage());
        }
        exit();
    }
}

function cluster_pred($requestMethod)
{
    $id = intval($_GET['id']);
    switch ($requestMethod)
    {
        case 'GET':
        try {
            $db = dbConnect();
            $request = "
                SELECT a.haut_tot, a.haut_tronc, s.stadedev, n.nomtech, f.feuillage 
                FROM arbre a
                JOIN fk_stadedev s on s.id_stadedev = a.id_stadedev
                JOIN fk_nomtech n on n.id_nomtech = a.id_nomtech
                JOIN feuillage f on f.id_feuillage = a.id_feuillage
                WHERE a.id = :id
                ";
            $statement = $db->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
             
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            // Commande python script1
            $command = "../../venv/myenv/bin/python3.11 ../py_files/script_fonc1.py ".floatval($result[0]['haut_tot'])." ".floatval($result[0]['haut_tronc'])." ".strval($result[0]['stadedev'])." ".strval($result[0]['nomtech'])." ".strval($result[0]['feuillage']);
            
            // Exécuter la commande
            $output = shell_exec($command);
            echo $output;

        } catch (\Throwable $th) {
            echo 'cluster_non_prédit';
            //echo ("Insertion failed: " . $e->getMessage());
        }
        exit();
    }
}


function afficher_arbres($requestMethod){
    switch ($requestMethod)
    {
        case 'GET':
            
            try {
                $db = dbConnect();
                $request = "
                SELECT * FROM arbre a
                JOIN clc_secteur s ON a.id_secteur = s.id_secteur
                JOIN fk_stadedev dev ON a.id_stadedev = dev.id_stadedev
                JOIN fk_port p ON a.id_port = p.id_port
                JOIN fk_revetement r ON a.id_revetement = r.id_revetement
                JOIN fk_nomtech n ON a.id_nomtech = n.id_nomtech
                JOIN feuillage f ON a.id_feuillage = f.id_feuillage
                ";
                
                //$request = "SELECT * FROM arbre";
                
                $statement = $db->prepare($request);
                $statement->execute();
                
                header('Content-Type: text/plain; charset=utf-8');
                header('Cache-control: no-store, no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('HTTP/1.1 200 OK');

                $arbres = $statement->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($arbres);  //retourne tous les arbres en format json
                
            } catch (\Throwable $th) {
                echo ('PAS OK' . $e->getMessage());
            }
            exit();
    }
}

function age_pred($requestMethod)
{
    $id = intval($_GET['id']);
    switch ($requestMethod)
    {
        case 'GET':
        try {
            $db = dbConnect();
            $request = "
                SELECT a.haut_tot, a.haut_tronc, a.tronc_diam, s.stadedev, n.nomtech 
                FROM arbre a
                JOIN fk_stadedev s on s.id_stadedev = a.id_stadedev
                JOIN fk_nomtech n on n.id_nomtech = a.id_nomtech
                WHERE a.id = :id
                ";
            $statement = $db->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
             
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $tab_max_range = [];
            $tab_max_range[] = $id;
            // Commande python script2
            for ($i = 0; $i < 4; $i++) {
                $command = "../../venv/myenv/bin/python3.11 ../py_files/script_fonc2.py ".floatval($result[0]['haut_tot'])." ".floatval($result[0]['haut_tronc'])." ".floatval($result[0]['tronc_diam'])." ".strval($result[0]['stadedev'])." ".strval($result[0]['nomtech'])." ".intval($i);
                
                // Exécuter la commande
                $output = shell_exec($command);

                $jsonString = get_first_line_json_file('../py_files/JSON/script2_result.json');

                // Décoder le JSON en un tableau associatif
                $data = json_decode($jsonString, true);

                // Initialiser les variables pour suivre l'écart avec le plus haut pourcentage
                $maxPercentage = -1;
                $maxRange = '';

                // Parcourir le tableau pour trouver l'écart avec le plus haut pourcentage
                foreach ($data as $range => $percentage) {
                    if ($percentage > $maxPercentage) {
                        $maxPercentage = $percentage;
                        $maxRange = $range;
                    }
                }

                $tab_max_range[] =$maxRange;
   
            }
            echo json_encode($tab_max_range);
            

        } catch (\Throwable $th) {
            //echo 'cluster_non_prédit';
            //echo ("Insertion failed: " . $e->getMessage());
        }
        exit();
    }
}

function tempete_pred($requestMethod)
{
    $id = intval($_GET['id']);
    switch ($requestMethod)
    {
        case 'GET':
        try {
            $db = dbConnect();
            $request = "
                SELECT a.haut_tot, a.haut_tronc, a.latitude, a.longitude, s.stadedev, c.secteur, p.port, r.revetement
                FROM arbre a
                JOIN fk_stadedev s on s.id_stadedev = a.id_stadedev
                JOIN clc_secteur c on c.id_secteur = a.id_secteur
                JOIN fk_port p on p.id_port = a.id_port
                JOIN fk_revetement r on r.id_revetement = a.id_revetement
                WHERE a.id = :id
                ";
            
            $statement = $db->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
             
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            $tab_max_range = [];
            $tab_max_range[] = $id;
            $i = 0;
            // Commande python script3
            echo floatval($result[0]['haut_tronc'])." ".floatval($result[0]['latitude'])." ".floatval($result[0]['longitude'])." ".strval($result[0]['stadedev'])." ".floatval($result[0]['haut_tot'])." ".strval($result[0]['secteur'])." ".intval($i);
            echo gettype(floatval($result[0]['haut_tronc']))." ".gettype(floatval($result[0]['latitude']))." ".gettype(floatval($result[0]['longitude']))." ".gettype(strval($result[0]['stadedev']))." ".gettype(floatval($result[0]['haut_tot']))." ".gettype(strval($result[0]['secteur']))." ".gettype(intval($i));
            //méthode 0:
            $command = "../../venv/myenv/bin/python3.11 ../py_files/script_fonc3.py ".floatval($result[0]['haut_tronc'])." ".floatval($result[0]['latitude'])." ".floatval($result[0]['longitude'])." "."'".strval($result[0]['stadedev'])."'"." ".floatval($result[0]['haut_tot'])." "."'".strval($result[0]['secteur'])."'". " ".intval($i);
            //$command = '../../venv/myenv/bin/python3.11 ../py_files/script_fonc3.py 2.1 49.2 3.2 "Adulte" 15.1 "Quai Gayant" 0';
            $output = shell_exec($command);
            echo $output;

            $jsonString = get_first_line_json_file('../py_files/JSON/script3_result.json');
            $data = json_decode($jsonString, true);

            $bool_value = 'NON';
            if (isset($data[0]) && $data[0] === 1) {
                $bool_value = 'OUI';
            }

            $tab_max_range[] =$bool_value;

            //méthode 1:
            $command = "../../venv/myenv/bin/python3.11 ../py_files/script_fonc3.py ".floatval($result[0]['latitude'])." ".floatval($result[0]['longitude'])." ".floatval($result[0]['secteur'])." ".strval($result[0]['port'])." ".intval(1);
            $output = shell_exec($command);

            $jsonString = get_first_line_json_file('../py_files/JSON/script3_result.json');
            $data = json_decode($jsonString, true);

            $bool_value = 'NON';
            if (isset($data[0]) && $data[0] === 1) {
                $bool_value = 'OUI';
            }

            $tab_max_range[] =$bool_value;

            //méthode 2:
            $command = "../../venv/myenv/bin/python3.11 ../py_files/script_fonc3.py ".floatval($result[0]['haut_tot'])." ".floatval($result[0]['revevetement'])." ".intval(2);
            $output = shell_exec($command);

            $jsonString = get_first_line_json_file('../py_files/JSON/script3_result.json');
            $data = json_decode($jsonString, true);

            $bool_value = 'NON';
            if (isset($data[0]) && $data[0] === 1) {
                $bool_value = 'OUI';
            }

            $tab_max_range[] =$bool_value;
   
            //echo json_encode($tab_max_range);

        } catch (\Throwable $th) {
            //echo 'cluster_non_prédit';
            //echo ("Insertion failed: " . $e->getMessage());
        }
        exit();
    }
}

function get_first_line_json_file($path_file)
{
    // Ouvrir le fichier en mode lecture
    $file = fopen($path_file, 'r');

    // Vérifier si le fichier a été ouvert correctement
    if ($file) {
        // Lire la première ligne du fichier
        $firstLine = fgets($file);

        // Fermer le fichier après la lecture
        fclose($file);

        // Afficher la première ligne
        //echo $firstLine;
        return $firstLine;
    } else {
        // Gérer l'erreur si le fichier n'a pas pu être ouvert
        echo 'Impossible d\'ouvrir le fichier.';
    }
}

function afficher_all_variable($requestMethod){
    switch ($requestMethod)
    {
        case 'GET':
        try {
            $all_variables = []; // Initialisation du tableau à deux dimensions

                $db = dbConnect();
                
                // Sélectionner toutes les valeurs de nomtech
                $request = "SELECT nomtech FROM fk_nomtech";  
                $statement = $db->prepare($request);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $all_variables[] = array_column($result, 'nomtech');

                // Sélectionner toutes les valeurs de stadedev
                $request = "SELECT feuillage FROM feuillage";  
                $statement = $db->prepare($request);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $all_variables[] = array_column($result, 'feuillage');

                // Sélectionner toutes les valeurs de stadedev
                $request = "SELECT stadedev FROM fk_stadedev";  
                $statement = $db->prepare($request);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $all_variables[] = array_column($result, 'stadedev');

                // Sélectionner toutes les valeurs de stadedev
                $request = "SELECT secteur FROM clc_secteur";  
                $statement = $db->prepare($request);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $all_variables[] = array_column($result, 'secteur');

                // Sélectionner toutes les valeurs de stadedev
                $request = "SELECT port FROM fk_port";  
                $statement = $db->prepare($request);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $all_variables[] = array_column($result, 'port');

                // Sélectionner toutes les valeurs de stadedev
                $request = "SELECT revetement FROM fk_revetement";  
                $statement = $db->prepare($request);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                $all_variables[] = array_column($result, 'revetement');

                // Retourner les données encodées en JSON
                echo json_encode($all_variables);

        } catch (\Throwable $th) {
            //echo 'cluster_non_prédit';
            //echo ("Insertion failed: " . $e->getMessage());
        }
        exit();
    }
}
