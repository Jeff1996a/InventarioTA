<?php

	/**
 	* Constantes para la base de datos
 	*/
	$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	define('DB_HOST', $cleardb_url["host"]);
	define('DB_USER', $cleardb_url["user"]);
	define('DB_PASSWORD', $cleardb_url["pass"]);
	define('DB_DATABASE_NAME', substr($cleardb_url["path"],1));
	define('DB_CHARSET', 'UTF8');

	/**
 	* Constantes de nombres de archivos
 	*/
	define('PAGINA_ERROR', 'error_page.php');
