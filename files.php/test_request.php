<?php
#ini_set('display_errors',1);
#error_reporting(E_ALL);

require_once 'add.php';


$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

switch ($requestRessource)
{
    case 'ajouter_arbre':
        ajouter_arbre();
        break;
    case 'afficher_arbre':
        afficher_arbre($requestMethod);
        break;
}


function ajouter_arbre()
{
    global $requestMethod;
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
                    $request = "INSERT INTO fk_nomtech (nomtech) VALUES ('lAAA')";
                    
                    
                    $statement = $db->prepare($request);
                    #$statement->bindParam(':nomtech', $fk_nomtech);
                    $statement->execute();
                    
                } catch (\Throwable $th) {
                    error_log("Insertion failed: " . $e->getMessage());
                    echo json_encode(['status' => 'error', 'message' => 'Data insertion failed']);
                }
            }else {
                //header('HTTP/1.1 400 Bad Request');
                echo 'non_ajouté';
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
                #print_r($db);
                
                $request = "INSERT INTO fk_nomtech (nomtech) VALUES ('le')";
                
                
                $statement = $db->prepare($request);
                #$statement->bindParam(':nomtech', $fk_nomtech);
                
                $statement->execute();
                echo "YES";
                
            } catch (Throwable $th) {
                error_log("Insertion failed: " . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'Data insertion failed']);
            }
            exit();
    }
}
/*
function ajouter_arbre()
{
    global $requestMethod;
    switch ($requestMethod)
    {
        case 'POST':
            if (!empty($_POST['haut_tot']) && !empty($_POST['haut_tronc']) && !empty($_POST['tronc_diam']) && !empty($_POST['fk_nomtech']) && !empty($_POST['feuillage']) && !empty($_POST['fk_stadedev']) && !empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['clc_secteur']) && !empty($_POST['fk_port']) && !empty($_POST['fk_revetement'])){
                header('Content-Type: text/plain; charset=utf-8');
                header('Cache-control: no-store, no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('HTTP/1.1 200 OK');
                User::addUser($_POST['haut_tot'], $_POST['haut_tronc'], $_POST['tronc_diam'], $_POST['fk_nomtech'], $_POST['feuillage'], $_POST['fk_stadedev'], $_POST['latitude'], $_POST['longitude'], $_POST['clc_secteur'], $_POST['fk_port'], $_POST['fk_revetement']);
                echo 'inscrit';
            }else {
                //header('HTTP/1.1 400 Bad Request');
                echo 'non_inscrit';
            }

            exit();
    }
}
*/
