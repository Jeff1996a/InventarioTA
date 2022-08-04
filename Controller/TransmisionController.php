<?php

$transmision = '';

$transmisionList = '';

$title = '';

$num_filas = '';

$action = '';

$tipo = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include_once("../Model/TransmisionModel.php");

    $transmision = new TransmisionModel();

    $tipo = isset($_POST['tipo']) ? ($_POST['tipo']) : '';

    $parametro =  isset($_POST['param']) ? ($_POST['param']) : '';

    $action = isset($_POST['action']) ? ($_POST['action']) : '';

    if(isset($_POST['register'])){
        $data = json_decode($_POST['register']);
        if($transmision->insertTransmision($data) != false){
            echo '<script language="JavaScript">';
            echo 'alert("Registro exitoso!!");';
            echo '</script>';
        }

    }


    if($action == 'Lista' && $tipo == 'Transmision'){
        $title = "Transmisiones";
        $transmisionList = $transmision->GetTransmisionList();
        $num_filas = mysqli_num_rows($transmisionList);

        include_once ("../View/ListaTransmisiones.php");
    }

    elseif($action == 'add transmission'){
        include_once "../View/AddTransmission.php";
    }

    elseif($action == "ListaEqu"){
        $title = "Lista de equipos";

        $equipmentList = $transmision->GetEquipmentListByTransmision($parametro);
        $num_filas = mysqli_num_rows($equipmentList);
        $idTransmision = $parametro;
        include_once "../View/ListaEquiposTransmision.php";
    }

}





