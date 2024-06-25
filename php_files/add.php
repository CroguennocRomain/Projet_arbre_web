<?php
session_start();


require_once 'database.php';

class User
{

    public $longitude;
    public $latitude;
    public $haut_tot;
    public $haut_tronc;
    public $tronc_diam;
    public $fk_stadedev;
    public $clc_secteur;
    public $fk_port;
    public $fk_revetement;
    public $fk_nomtech;
    public $feuillage;


    static function addUser(string $haut_tot, string $haut_tronc, string $tronc_diam, string $fk_nomtech, string $feuillage, string $fk_stadedev, string $latitude, string $longitude, string $clc_secteur, string $fk_port, string $fk_revetement): bool
    {
        try {
            $db = DB::connexion();

            // create the new user and link the playlist favoris
            $request = "
            INSERT INTO arbre(longitude, latitude, haut_tot, haut_tronc, tronc_diam) VALUES 
            (:longitude, :latitude, :haut_tot, :haut_tronc, :tronc_diam)
            ;";
            $statement = $db->prepare($request);
            $statement->bindParam(':longitude', $longitude);
            $statement->bindParam(':latitude', $latitude);
            $statement->bindParam(':haut_tot', $haut_tot);
            $statement->bindParam(':haut_tronc', $haut_tronc);
            $statement->bindParam(':tronc_diam', $tronc_diam);
            $statement->execute();

            return true;
        }
        catch (PDOException $exception)
        {
            error_log('Request error: '.$exception->getMessage());
            return false;
        }
    }



}
?>