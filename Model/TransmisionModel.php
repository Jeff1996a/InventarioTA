<?php
include '../config.php';

class TransmisionModel
{
    private $dbConn;
    private $transmision_list;

    function __construct(){
        $this-> transmision_list = array();
        $this-> dbConn =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE_NAME);
        mysqli_set_charset($this->dbConn, DB_CHARSET);
    }

    function insertTransmision($obj){
        mysqli_query($this->dbConn ,"SET @ubi='".$obj->ubi."'");
        mysqli_query($this->dbConn ,"SET @tec='".$obj->tec."'");
        mysqli_query($this->dbConn ,"SET @correo='".$obj->correo."'");
        mysqli_query($this->dbConn ,"SET @uni_movil='".$obj->uni_movil."'");
        mysqli_query($this->dbConn ,"SET @fecha_ini='".$obj->fecha_ini."'");
        mysqli_query($this->dbConn ,"SET @fecha_fin='".$obj->fecha_fin."'");
        mysqli_query($this->dbConn ,"SET @prob='".$obj->prob."'");
        mysqli_query($this->dbConn ,"SET @sol='".$obj->sol."'");
        mysqli_query($this->dbConn ,"SET @obs='".$obj->obs."'");

        mysqli_multi_query ($this->dbConn, "CALL uspCreateTransmission(@ubi,@tec,@correo,@uni_movil,@fecha_ini,@fecha_fin,@prob,@sol,@obs)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }

    function GetTransmisionList(){
        mysqli_multi_query ($this->dbConn, "CALL uspVistaListaTransmisiones") OR DIE (mysqli_error($this->dbConn));
        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    function GetEquipmentListByTransmision($id){
        mysqli_query($this->dbConn, "SET @id='".$id."'");

        mysqli_multi_query($this->dbConn, "CALL uspLeerEquiposTransmision(@id)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }
}