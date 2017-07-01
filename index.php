<?php
	// Allow from any origin
	if (isset($_SERVER['HTTP_ORIGIN'])) {
		header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 86400');    // cache for 1 day
	}

	// Access-Control headers are received during OPTIONS requests
	if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

		if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

		exit(0);
	}

	define('__ROOT__', dirname(dirname(__FILE__)) .'/repo');

	// Load Classes 
	require_once dirname(__FILE__).'/classes/sinpin.php';
	require_once dirname(__FILE__).'/classes/sinpin_base.php';
	require_once dirname(__FILE__).'/classes/sinpin_ratelookup.php';
	require_once dirname(__FILE__).'/classes/sinpin_accountbalance.php';
	require_once dirname(__FILE__).'/classes/sinpin_recharge.php';
	require_once dirname(__FILE__).'/classes/sinpin_accountbalance.php';
	
	$_GET['apikey'] = '9e8roNDqY4Ssx6A607TxwYoJI0y246Ph';
	$_GET['username'] = 'airecommapi3722';
	$_GET['password'] = 'Madderom!*923**781';
	
	try {					
		$request = array();
		
		// Handling the supported actions:
		switch($_GET['request']) {
			case 'Agent/Ratelookup': 
				$request = Sinpin::RateLookUp($_GET); 
			break;
			
			case 'Agent/Recharge': 
				$request = Sinpin::ReCharge($_GET);  
			break;
			
			case 'Agent/AccountBalance': 
				$request = Sinpin::AccountBalance($_GET);  
			break;
						
			default:
				throw new Exception('Wrong action');
		}
		
		echo json_encode($request);
	} catch(Exception $e) {
		die(json_encode(array('error' => $e->getMessage())));
	}
?>