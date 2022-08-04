<?php
include 'DBConnection.php';

class IncidenciasModel
{
    private $dbConn;
    private $incidencias_list;

    function __construct(){
        $this-> incidencias_list = array();
        $this-> dbConn =  mysqli_connect(HOST, USER, PASSWORD, DATABASE_NAME);
        mysqli_set_charset($this->dbConn, CHARSET);
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