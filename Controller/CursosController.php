<?php

$action = '';
$data = '';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['action']) && isset($_GET['data']) ){

        $action = $_GET['action'];

        $data = json_decode($_GET['data']);

        if($action == 'listarCursos' ){

            include_once ('../Model/IncidenciasModel.php');

            $incidencias = new IncidenciasModel();

            $title = "Incidencias";

            $list = $incidencias->GetIncidenciasList();

            $num_filas = mysqli_num_rows($list);

            include_once ("../View/ListaIncidencias.php");
        }
    }

}