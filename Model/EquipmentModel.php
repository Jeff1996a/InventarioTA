<?php
include 'DBConnection.php';

class EquipmentModel
{

    public $marca;
    public $modelo;
    public $descripcion;
    public $codigo_ta;
    public $num_serie;
    public $fecha_inst;
    public $proveedor;
    public $responsable;
    public $ubicacion;
    public $id_estado;
    public $id_tipo_equi;
    public $disponibilidad;
    public $observacion;


    private $dbConn;
    private $equipment_list;

    function __construct(){
        $this-> equipment_list = array();
        $this-> dbConn =  mysqli_connect(HOST, USER, PASSWORD, DATABASE_NAME);

        mysqli_set_charset($this->dbConn, CHARSET);
    }

    function createEquipment($obj){
        mysqli_query($this->dbConn ,"SET @Marca='".$obj->marca."'");
        mysqli_query($this->dbConn ,"SET @Modelo='".$obj->modelo."'");
        mysqli_query($this->dbConn ,"SET @Descripcion='".$obj->descripcion."'");
        mysqli_query($this->dbConn ,"SET @Codigo_ta='".$obj->codigo_ta."'");
        mysqli_query($this->dbConn ,"SET @Num_serie='".$obj->num_serie."'");
        mysqli_query($this->dbConn ,"SET @Fecha_inst='".$obj->fecha_inst."'");
        mysqli_query($this->dbConn ,"SET @Proveedor='".$obj->proveedor."'");
        mysqli_query($this->dbConn ,"SET @Responsable='".$obj->responsable."'");
        mysqli_query($this->dbConn ,"SET @Ubicacion='".$obj->ubicacion."'");
        mysqli_query($this->dbConn ,"SET @Id_estado='".$obj->id_estado."'");
        mysqli_query($this->dbConn ,"SET @Id_tipo_equi='".$obj->id_tipo_equi."'");
        mysqli_query($this->dbConn ,"SET @Disponibilidad='".$obj->disponibilidad."'");
        mysqli_query($this->dbConn ,"SET @Observacion='".$obj->observacion."'");


        mysqli_multi_query ($this->dbConn, "CALL uspInsertarEquipo(@Marca,@Modelo,@Descripcion,@Codigo_ta,@Num_serie,@Fecha_inst,@Proveedor,,@Responsable,@Ubicacion,@Id_estado,@Id_tipo_equi,@Disponibilidad,@Observacion)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($this->equipment_list = mysqli_store_result($this->dbConn)) {

                return $this->equipment_list;
            }
        }
    }

    function GetEquipmentList(){
        mysqli_multi_query ($this->dbConn, "CALL uspVistaListaEquipos") OR DIE (mysqli_error($this->dbConn));
        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }

        }
    }

    function GetEquimentByType($category){
        mysqli_query($this->dbConn ,"SET @type='".$category."'");

        mysqli_multi_query ($this->dbConn, "CALL uspGetEquipmentByType(@type)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($this->equipment_list = mysqli_store_result($this->dbConn)) {

                return $this->equipment_list;
            }
        }
    }

    function GetEquipmentByDesc($desc, $type){
        mysqli_query($this->dbConn, "SET @descripcion='".$desc."'");
        mysqli_query($this->dbConn, "SET @type='".$type."'");

        mysqli_multi_query($this->dbConn, "CALL uspFiltrarPorEquipo(@descripcion, @type)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }

    function GetEquipmentByMarca($marca, $type){
        mysqli_query($this->dbConn, "SET @marca='".$marca."'");
        mysqli_query($this->dbConn, "SET @type='".$type."'");

        mysqli_multi_query($this->dbConn, "CALL uspFiltrarPorMarca(@marca, @type)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    function GetEquipmentBySerie($serie, $type){
        mysqli_query($this->dbConn, "SET @serie='".$serie."'");
        mysqli_query($this->dbConn, "SET @type='".$type."'");

        mysqli_multi_query($this->dbConn, "CALL uspFiltrarPorSerie(@serie, @type)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {
            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    function GetEquipmentByDep($dep, $type){
        mysqli_query($this->dbConn, "SET @departamento='".$dep."'");
        mysqli_query($this->dbConn, "SET @type='".$type."'");

        mysqli_multi_query($this->dbConn, "CALL uspFiltrarPorDepartamento(@departamento, @type)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    function GetEquipmentByEst($state, $type){
        mysqli_query($this->dbConn, "SET @estado='".$state."'");
        mysqli_query($this->dbConn, "SET @type='".$type."'");

        mysqli_multi_query($this->dbConn, "CALL uspFiltrarPorEstado(@estado, @type)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    function GetEquipmentHistory($id){
        mysqli_query($this->dbConn, "SET @id='".$id."'");

        mysqli_multi_query($this->dbConn, "CALL uspEquipmentHistory(@id)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    function GetEquipmentAccesories($id){
        mysqli_query($this->dbConn, "SET @id='".$id."'");

        mysqli_multi_query($this->dbConn, "CALL uspGetAccesoriesList(@id)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {
                return $result;
            }
        }
    }

    //Crear un nuevo registro para el historial de mantenimiento de cada equipo
    function AddHistoryRecord($obj){
        mysqli_query($this->dbConn ,"SET @id='".$obj->idEquipo."'");
        mysqli_query($this->dbConn ,"SET @ult_mant='".$obj->ultMant."'");
        mysqli_query($this->dbConn ,"SET @ingreso='".$obj->ingreso."'");
        mysqli_query($this->dbConn ,"SET @prob='".$obj->prob."'");
        mysqli_query($this->dbConn ,"SET @sol='".$obj->sol."'");
        mysqli_query($this->dbConn ,"SET @obs='".$obj->obs."'");
        mysqli_query($this->dbConn ,"SET @rep='".$obj->rep."'");
        mysqli_query($this->dbConn ,"SET @disp='".$obj->disp."'");
        mysqli_query($this->dbConn ,"SET @tec='".$obj->tec."'");
        mysqli_query($this->dbConn ,"SET @correo='".$obj->email."'");


        mysqli_multi_query ($this->dbConn, "CALL uspCreateHistoryRecord(@id,@ult_mant,@ingreso,@prob,@sol,@obs,@rep,@disp,@tec,@correo)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }

    //Crear un nuevo registro para el historial de mantenimiento de cada equipo
    function AddAccesorio($obj){
        mysqli_query($this->dbConn ,"SET @Descripcion='".$obj->descripcion."'");
        mysqli_query($this->dbConn ,"SET @Disponibilidad='".$obj->disponibilidad."'");
        mysqli_query($this->dbConn ,"SET @Serie='".$obj->serie."'");
        mysqli_query($this->dbConn ,"SET @SerieTA='".$obj->serieTA."'");
        mysqli_query($this->dbConn ,"SET @IdEqu='".$obj->idEquipo."'");

        mysqli_multi_query ($this->dbConn, "CALL uspAgregarAccesorios(@Descripcion,@Disponibilidad,@Serie,@SerieTA,@IdEqu)") OR DIE (mysqli_error($this->dbConn));

        while (mysqli_more_results($this->dbConn)) {

            if ($result = mysqli_store_result($this->dbConn)) {

                return $result;
            }
        }
    }
}
