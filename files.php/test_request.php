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
        ajouter_arbre();

}

function inscription()
{
    global $requestMethod;
    switch ($requestMethod)
    {
        case 'POST':
            if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['date_naissance']) && !empty($_POST['mail']) && !empty($_POST['mdp'])){
                header('Content-Type: text/plain; charset=utf-8');
                header('Cache-control: no-store, no-cache, must-revalidate');
                header('Pragma: no-cache');
                header('HTTP/1.1 200 OK');
                User::addUser($_POST['mail'], $_POST['prenom'], $_POST['nom'], $_POST['date_naissance'], $_POST['mdp']);
                echo 'inscrit';
            }else {
                //header('HTTP/1.1 400 Bad Request');
                echo 'non_inscrit';
            }

            exit();
    }
}
