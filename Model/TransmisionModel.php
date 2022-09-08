<?php
include '../config.php';

class TransmisionModel
{

    public $id_transmision;
    public $nombre;
    public $ubicacion;
    public $tecnico;
    public $email;
    public $movil;
    public $inicio;
    public $fin;
    public $obs;
    public $result;

    private $dbConn;
    private $transmision_list;

    function __construct(){
        $this-> transmision_list = array();
        $this-> dbConn =  mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE_NAME);
        mysqli_set_charset($this->dbConn, DB_CHARSET);
    }

    //función para crear la transmisión
    function CrearTransmision($obj){
        mysqli_query($this->dbConn ,"SET @Nom='".$obj->nombre."'");
        mysqli_query($this->dbConn ,"SET @Ubi='".$obj->ubicacion."'");
        mysqli_query($this->dbConn ,"SET @Tec='".$obj->tecnico."'");
        mysqli_query($this->dbConn ,"SET @Correo='".$obj->email."'");
        mysqli_query($this->dbConn ,"SET @Movil='".$obj->movil."'");
        mysqli_query($this->dbConn ,"SET @Inicio='".$obj->inicio."'");
        mysqli_query($this->dbConn ,"SET @Fin='".$obj->fin."'");
        mysqli_query($this->dbConn ,"SET @Obs='".$obj->obs."'");


        mysqli_multi_query ($this->dbConn, "CALL uspCrearTransmision(@Nom,@Ubi,@Tec,@Correo,@Movil,@Inicio,@Fin,@Obs)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }

    //Listar todas las transmisiones
    function GetTransmisionList(){
        mysqli_multi_query ($this->dbConn, "CALL uspVistaListaTransmisiones") OR DIE (mysqli_error($this->dbConn));
        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    //Obtener transmision
    function ObtenerTransmision($id){
        mysqli_query($this->dbConn ,"SET @id='".$id."'");

        mysqli_multi_query ($this->dbConn, "CALL uspObtenerTransmision(@id)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }

    function EliminarTransmision($id){
        mysqli_query($this->dbConn ,"SET @id='".$id."'");

        mysqli_multi_query ($this->dbConn, "CALL uspEliminarTransmision(@id)") 
            OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }
}