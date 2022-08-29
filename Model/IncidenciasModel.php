<?php
include '../config.php';

class IncidenciasModel
{
    private $dbConn;
    private $incidencias_list;

    function __construct(){
        $this-> incidencias_list = array();
        $this-> dbConn =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE_NAME);
        mysqli_set_charset($this->dbConn, DB_CHARSET);
    }

    function GetIncidenciasList(){
        mysqli_multi_query ($this->dbConn, "CALL uspLeerListaIncidencias") OR DIE (mysqli_error($this->dbConn));
        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }
}