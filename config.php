<?php

	/**
 	* Constantes para la base de datos
 	*/
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	/**
 	* Constantes de nombres de archivos
 	*/
	define('PAGINA_ERROR', 'error_page.php');
