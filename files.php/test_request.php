<?php
require_once 'Research.php';
require_once 'User.php';

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

try {
    DB::connexion();
}
catch (PDOException $exception){
    header('HTTP/1.1 503 Service Unavailable');
    echo $exception->getMessage();
    exit();
}

switch ($requestRessource)
{
    case 'ajouter_arbre':
        echo 'non_inscrit2';
        ajouter_arbre();
    default : 
        echo 'non_inscrit1';

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
                User::addUser($_POST['haut_tot'], $_POST['haut_tronc'], $_POST['tronc_diam'], $_POST['fk_nomtech'], $_POST['feuillage'], $_POST['fk_stadedev'], $_POST['latitude'], $_POST['longitude'], $_POST['clc_secteur'], $_POST['fk_port'], $_POST['fk_revetement']);
                echo 'inscrit';
            }else {
                //header('HTTP/1.1 400 Bad Request');
                echo 'non_inscrit';
            }

            exit();
    }
}
