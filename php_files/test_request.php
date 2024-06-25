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
    case 'afficher_arbre':
        afficher_arbre($requestMethod);
        break;
}
function ajouter_arbre($requestMethod, $longitude, $latitude, $haut_tot, $haut_tronc, $tronc_diam, $clc_secteur, $fk_stadedev, $fk_port, $fk_revetement, $fk_nomtech, $feuillage)
{
    switch ($requestMethod)
    {
        case 'POST':
            try {
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
                INSERT INTO clc_secteur(secteur) 
                VALUES (:secteur)
                RETURNING id_secteur;
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':secteur', $clc_secteur);
                $statement->execute();
                
                $id_secteur = $statement->fetch(PDO::FETCH_NUM)[0];

                
                // Table fk_stadedev

                $request = "
                INSERT INTO fk_stadedev(stadedev) 
                VALUES (:stadedev)
                RETURNING id_stadedev;
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':stadedev', $fk_stadedev);
                $statement->execute();
                
                $id_stadedev = $statement->fetch(PDO::FETCH_NUM)[0];


                // Table fk_port

                $request = "
                INSERT INTO fk_port(port) 
                VALUES (:port)
                RETURNING id_port;
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':port', $fk_port);
                $statement->execute();
                
                $id_port = $statement->fetch(PDO::FETCH_NUM)[0];


                // Table fk_revetement

                $request = "
                INSERT INTO fk_revetement(revetement) 
                VALUES (:revetement)
                RETURNING id_revetement;
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':revetement', $fk_revetement);
                $statement->execute();
                
                $id_revetement = $statement->fetch(PDO::FETCH_NUM)[0];


                // Table fk_nomtech

                $request = "
                INSERT INTO fk_nomtech(nomtech) 
                VALUES (:nomtech)
                RETURNING id_nomtech;
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':nomtech', $fk_nomtech);
                $statement->execute();
                
                $id_nomtech = $statement->fetch(PDO::FETCH_NUM)[0];


                // Table feuillage

                $request = "
                INSERT INTO feuillage(feuillage) 
                VALUES (:feuillage)
                RETURNING id_feuillage;
                ";
                $statement = $db->prepare($request);
                $statement->bindParam(':feuillage', $feuillage);
                $statement->execute();
                
                $id_feuillage = $statement->fetch(PDO::FETCH_NUM)[0];

                // Table arbre
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

            } catch (\Throwable $th) {
                echo 'arbre_non_ajouté';
                //echo ("Insertion failed: " . $e->getMessage());
            }
            exit();
    }
}

function ajouter_un_arbre($requestMethod)
{
    if (!empty($_POST['haut_tot']) && !empty($_POST['haut_tronc']) && !empty($_POST['tronc_diam']) && !empty($_POST['fk_nomtech']) && !empty($_POST['feuillage']) && !empty($_POST['fk_stadedev']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['clc_secteur']) && !empty($_POST['fk_port']) && !empty($_POST['fk_revetement'])){
        $db = dbConnect();
                    
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

function add_database_csv($requestMethod){
    switch ($requestMethod)
    {
        case 'POST':
        try {
            $db = dbConnect();

            // Lire le fichier CSV
            $file = fopen('path/to/your/data.csv', 'r');
            if ($file === false) {
                echo "Erreur lors de l'ouverture du fichier CSV.";
                exit();
            }

            // Ignorer la première ligne (en-têtes)
            fgetcsv($file);

            // Traiter chaque ligne du fichier CSV
            while (($row = fgetcsv($file)) !== false) {
                // Extraire les données pertinentes
                list($longitude, $latitude, $clc_quartier, $clc_secteur, $haut_tot, $haut_tronc, $tronc_diam, $fk_arb_etat, $fk_stadedev, $fk_port, $fk_pied, $fk_situation, $fk_revetement, $age_estim, $fk_prec_estim, $clc_nbr_diag, $fk_nomtech, $villeca, $feuillage, $remarquable) = $row;

                ajouter_arbre($requestMethod, $longitude, $latitude, $haut_tot, $haut_tronc, $tronc_diam, $clc_secteur, $fk_stadedev, $fk_port, $fk_revetement, $fk_nomtech, $feuillage);
            }

        } catch (\Throwable $th) {
            echo 'arbre_non_ajouté';
            //echo ("Insertion failed: " . $e->getMessage());
        }
        exit();
    }
}





/*function ajouter_arbre($requestMethod)
{
    switch ($requestMethod)
    {
        case 'POST':
            if (!empty($_POST['haut_tot']) && !empty($_POST['haut_tronc']) && !empty($_POST['tronc_diam']) && !empty($_POST['fk_nomtech']) && !empty($_POST['feuillage']) && !empty($_POST['fk_stadedev']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['clc_secteur']) && !empty($_POST['fk_port']) && !empty($_POST['fk_revetement'])){
                header('Content-Type: text/plain; charset=utf-8');
                header('Cache-control: no-store, no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('HTTP/1.1 200 OK');
                #User::addUser($_POST['haut_tot'], $_POST['haut_tronc'], $_POST['tronc_diam'], $_POST['fk_nomtech'], $_POST['feuillage'], $_POST['fk_stadedev'], $_POST['latitude'], $_POST['longitude'], $_POST['clc_secteur'], $_POST['fk_port'], $_POST['fk_revetement']);
                #echo 'ajouté';
                
                $fk_nomtech = $_POST['fk_nomtech'];
                try {
                    $db = dbConnect();
                    $request = "INSERT INTO fk_nomtech (nomtech) VALUES ('lAAlkdaA')";
                    
                    
                    $statement = $db->prepare($request);
                    #$statement->bindParam(':nomtech', $fk_nomtech);
                    $statement->execute();
                    echo "arbre_ajouté";
                    
                } catch (\Throwable $th) {
                    error_log("Insertion failed: " . $e->getMessage());
                    echo json_encode(['status' => 'error', 'message' => 'Data insertion failed']);
                }
            }else {
                //header('HTTP/1.1 400 Bad Request');
                echo 'arbre_non_ajouté';
            }
            exit();
    }
}

function afficher_arbre($requestMethod){
    switch ($requestMethod)
    {
        case 'GET':
            
            try {
                $db = dbConnect();

                // Table arbre
                $request = "
                INSERT INTO arbre (longitude, latitude, haut_tot, haut_tronc, tronc_diam, id_user, id_secteur, id_stadedev, id_port, id_revetement, id_nomtech, id_feuillage)
                VALUES ((float)'12.3', (float)'12.3', (float)'6', (float)'6', (float)'6', (int)'2', (int)'2', (int)'2', (int)'2', (int)'2', (int)'2', (int)'2')";
                
                $statement = $db->prepare($request);
                
                $statement->bindParam(':longitude', (float)'12.3');
                $statement->bindParam(':latitude', (float)'6');
                $statement->bindParam(':haut_tot', (float)'3');
                $statement->bindParam(':haut_tronc', (float)'42');
                $statement->bindParam(':tronc_diam', (float)'35');
                $statement->bindParam(':id_user', (int)'2');
                $statement->bindParam(':id_secteur', (int)'2');
                $statement->bindParam(':id_stadedev', (int)'2');
                $statement->bindParam(':id_port', (int)'2');
                $statement->bindParam(':id_revetement', (int)'2');
                $statement->bindParam(':id_nomtech', (int)'2');
                $statement->bindParam(':id_feuillage', (int)'2');
                echo 'YES';
                $statement->execute();
                echo 'NO';
                header('Content-Type: text/plain; charset=utf-8');
                header('Cache-control: no-store, no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('HTTP/1.1 200 OK');
                echo "arbre_ajouté";

                
                
            } catch (\Throwable $th) {
                //echo 'arbre_non_ajouté';
                echo ("Insertion failed: " . $e->getMessage());
            }
            exit();
    }
}
*/
