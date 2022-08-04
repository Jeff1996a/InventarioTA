<?php

    $equipment = '';

    $equipmentList = '';

    $title = '';

    $num_filas = '';

    $action = '';

    $tipo_equipo = '';

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        include_once("../Model/EquipmentModel.php");

        $equipment = new EquipmentModel();



        $action = isset($_POST['action']) ? ($_POST['action']) : '';

        $parametro =  isset($_POST['param']) ? ($_POST['param']) : '';

        $filtro = isset($_POST['filter']) ? ($_POST['filter']) : '';

        if(isset($_POST['historyRecord'])){
            $data = json_decode($_POST['historyRecord']);
            if($equipment->AddHistoryRecord($data) != false){
                echo '<script language="JavaScript">';
                echo 'alert("Registro exitoso!!");';
                echo '</script>';
            }
        }

        if(isset($_POST['accesorioEqu'])){
            $data = json_decode($_POST['accesorioEqu']);


            if($equipment->AddAccesorio($data) != false){
                echo '<script language="JavaScript">';
                echo 'alert("Registro exitoso!!");';
                echo '</script>';
            }
        }

        if($action == 'Lista' && $tipo_equipo != ''){
            switch($tipo_equipo){
                case "Accesorio":
                    $title = "Accesorios";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                case "Audio":
                    $title = "Equipos de audio";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                case "Cables":
                    $title = "Cables";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                case "Edición":
                    $title = "Equipos de edición";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                case "Video":
                    $title = "Equipos de video";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                case "Red":
                    $title = "Equipos de red";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                case "Electrico":
                    $title = "Equipos eléctricos";
                    $equipmentList = $equipment->GetEquimentByType($tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);
                    break;

                default:
                    $title = "No se pudo cargar la lista";
                    break;
            }

            include_once ("../View/ListaEquipos.php");
        }

        elseif($action == "add equipment"){
            include_once "../View/AddEquipment.php";
        }

        elseif($action == "add history"){
            $idEquipment = $parametro;
            include_once "../View/AddHistoryRecord.php";
        }

        elseif($action == "add accesories"){
            $idEquipment = $parametro;
            include_once "../View/AddAccesoriesEquipment.php";
        }


        elseif($action == "Filter" && $tipo_equipo != ''){
            switch($tipo_equipo){
                case "Accesorio":
                    $title = "Accesorios";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;

                case "Audio":
                    $title = "Equipos de audio";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;

                case "Cables":
                    $title = "Cables";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;

                case "Edición":
                    $title = "Equipos de edición";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;

                case "Video":
                    $title = "Equipos de video";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;

                case "Red":
                    $title = "Equipos de red";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;

                case "Electrico":
                    $title = "Equipos eléctricos";

                    $equipmentList = validateFilter($filtro, $equipment, $parametro, $tipo_equipo);
                    $num_filas = mysqli_num_rows($equipmentList);

                    break;


                default:
                    $title = "No se pudo cargar la lista";
                    break;
            }
            include_once ("../View/ListaEquipos.php");
        }

        elseif($action == "Historial"){
            $title = "Historial de Mantenimiento";

            $equipmentList = $equipment->GetEquipmentHistory($parametro);
            $num_filas = mysqli_num_rows($equipmentList);
            $idEquipment = $parametro;
            include_once "../View/Historial_mantenimiento.php";
        }

        elseif($action == "Accesorio Equ"){

            $title = "Accesorios del equipo";
            $equipmentAccesories= $equipment->GetEquipmentAccesories($parametro);
            $num_filas = mysqli_num_rows($equipmentAccesories);
            $idEquipment = $parametro;
            include_once "../View/AccesoriosEquipo.php";
        }
    }

    function validateFilter($filter, $equipment, $parametro, $tipo_equipo){
        if($filter == 'Descripcion'){
            $equipmentList = $equipment->GetEquipmentByDesc($parametro, $tipo_equipo);
        }
        if($filter == 'Marca'){
            $equipmentList = $equipment->GetEquipmentByMarca($parametro, $tipo_equipo);
        }

        if($filter == 'Serie'){
            $equipmentList = $equipment->GetEquipmentBySerie($parametro, $tipo_equipo);
        }

        if($filter == 'Departamento'){
            $equipmentList = $equipment->GetEquipmentByDep($parametro, $tipo_equipo);
        }

        if($filter == 'Estado'){
            $equipmentList = $equipment->GetEquipmentByEst($parametro, $tipo_equipo);
        }

        return $equipmentList;
    }



