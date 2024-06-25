<?php

  require_once('constants.php');

  //----------------------------------------------------------------------------
  //--- dbConnect --------------------------------------------------------------
  //----------------------------------------------------------------------------
  // Create the connection to the database.
  // \return False on error and the database otherwise.
  function dbConnect()
  {
    try
    {
      $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8'.';port=3307',
        DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $exception)
    {
      error_log('Connection error: '.$exception->getMessage());
      return false;
    }
    return $db;
  }


  function dbRequestArbres($db){
    try
        {
          $request = 'SELECT * FROM arbre';
          $statement = $db->prepare($request);
          $statement->execute();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $exception)
        {
          error_log('Request error: '.$exception->getMessage());
          return false;
        }
        return $result;
  }