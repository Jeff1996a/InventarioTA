<?php


class Historial
{
    public $id_historial;
    public $fecha_ult_job;
    public $fecha_ingreso;
    public $fecha_ult_mant;
    public $problema;
    public $solucion;
    public $solic_repuesto;
    public $id_tecnico;
    public $id_equipo;

    function __construct()
    {
        $this-> id_historial = 0;
        $this-> fecha_ult_job = NULL;
        $this-> fecha_ingreso = NULL;
        $this-> fecha_ult_mant = NULL;
        $this-> problema = "";
        $this-> solucion = "";
        $this-> solic_repuesto = false;
        $this-> id_tecnico = 0;
        $this-> id_equipo = 0;
    }

}