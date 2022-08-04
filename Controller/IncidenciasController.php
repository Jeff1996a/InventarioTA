<?php

$incidencias = '';

$incidenciasList = '';

$title = '';

$num_filas = '';

$action = '';

$tipo = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include_once("../Model/IncidenciasModel.php");

    $incidencias = new IncidenciasModel();

    $tipo = isset($_POST['tipo']) ? ($_POST['tipo']) : '';

    $action = isset($_POST['action']) ? ($_POST['action']) : '';

    if($action == 'Lista' && $tipo == 'Incidencias'){
        $title = "Incidencias";
        $incidenciasList = $incidencias->GetIncidenciasList();
        $num_filas = mysqli_num_rows($incidenciasList);

        include_once ("../View/ListaIncidencias.php");
    }

    elseif($action == 'add incidencia'){
        include_once "../View/AddIncidencia.php";
    }

}
