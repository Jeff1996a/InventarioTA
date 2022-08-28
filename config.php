<?php

	/**
 	* Constantes para la base de datos
 	*/
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	define('DB_HOST', 'us-cdbr-east-06.cleardb.net');
	define('DB_USER', 'b6d703c41b07c3');
	define('DB_PASSWORD', '5d4c55e4');
	define('DB_DATABASE_NAME', 'heroku_e4baa52f58ccb53');
	define('DB_CHARSET', 'UTF8');

	/**
 	* Constantes de nombres de archivos
 	*/
	define('PAGINA_ERROR', 'error_page.php');
