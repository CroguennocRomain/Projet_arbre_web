<?php 
	require_once('database.php');

	// Database connexion.
	$db = dbConnect();
	if (!$db){
		header('HTTP/1.1 503 Service Unavailable');
		exit;
	}


	$requestMethod = $_SERVER['REQUEST_METHOD'];
    $request = explode('/', $_SERVER['PATH_INFO']);

    if ($requestMethod == 'GET'){
        if ($request[1] == 'arbres'){
            $data = dbRequestArbres($db);
   	    }
    }


	// Send data to the client.
	header('Content-Type: application/json; charset=utf-8');
	header('Cache-control: no-store, no-cache, must-revalidate');
	header('Pragma: no-cache');
	header('HTTP/1.1 200 OK');
	echo json_encode($data);
