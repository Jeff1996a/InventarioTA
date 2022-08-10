<?php
$action = '';

$data = '';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['action']) && isset($_GET['data']) ){

        $action = $_GET['action'];

        if($action == 'listarIncidencias' ){

            include_once ('../Model/IncidenciasModel.php');

            $incidencias = new IncidenciasModel();

            $title = "Incidencias";

            $list = $incidencias->GetIncidenciasList();

            $num_filas = mysqli_num_rows($list);

            include_once ("../View/ListaIncidencias.php");
        }

        elseif($action == 'viewAddIncidencias'){

            include_once "../View/AddIncidencia.php";

        }
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "POST"){

    include_once("../Model/IncidenciasModel.php");

    $incidencias = new IncidenciasModel();

    $tipo = isset($_POST['tipo']) ? ($_POST['tipo']) : '';

    $action = isset($_POST['action']) ? ($_POST['action']) : '';

    if($action == 'Lista' && $tipo == 'Incidencias'){
        $title = "Incidencias";
        $incidenciasList = $incidencias->GetIncidenciasList();
        $num_filas = mysqli_num_rows($incidenciasList);


    }

}
