<?php

use mysql_xdevapi\Result;

$action = '';

$data = '';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['action']) && isset($_GET['data'])){

        $action = $_GET['action'];
        $data = json_decode($_GET['data']);

        if($action == 'listarEquipos'){

            include_once('../Model/EquipmentModel.php');

            $equipment =  new EquipmentModel();

            $category = $data->{'category'};

            switch($category){
                case 'audio':
                    $title = 'Equipos de audio';
                    $list = $equipment->GetEquimentByType($category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case 'cables':
                    $title = 'Cables';
                    $list = $equipment->GetEquimentByType($category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case 'edicion':
                    $title = "Equipos de edición";
                    $list = $equipment->GetEquimentByType($category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case 'video':
                    $title = "Equipos de video";
                    $list = $equipment->GetEquimentByType($category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case 'red':
                    $title = "Equipos de red";
                    $list = $equipment->GetEquimentByType($category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case 'electrico':
                    $title = "Equipos eléctricos";
                    $list = $equipment->GetEquimentByType($category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                default:
                    $title = "No se pudo cargar la lista";
                    break;
            }

            include_once ("https://taller-ta.herokuapp.com/View/ListaEquipos.php");
        }

        elseif ($action == 'viewAddEquipment'){

            $category = $data->{'category'};

            include_once('../View/AddEquipment.php');
        }

        elseif ($action == 'viewHistory'){

            include_once('../Model/EquipmentModel.php');

            $equipment =  new EquipmentModel();

            $category = $data->{'category'};

            $id = $data->{'id'};

            $title = "Historial de Mantenimiento";

            $equipmentList = $equipment->GetEquipmentHistory($id);

            $num_filas = mysqli_num_rows($equipmentList);

            include_once ('https://taller-ta.herokuapp.com/View/Historial_mantenimiento.php');
        }

        elseif($action == 'viewAddHistory'){

            $id = $data->{'id'};

            $category = $data->{'category'};

            include_once ('../View/AddHistoryRecord.php');
        }

        elseif($action == "viewAccesories"){

            include_once('https://taller-ta.herokuapp.com/Model/EquipmentModel.php');

            $equipment =  new EquipmentModel();

            $id = $data->{'id'};

            $category = $data->{'category'};

            $title = "Accesorios del equipo";

            $accesories= $equipment->GetEquipmentAccesories($id);

            $num_filas = mysqli_num_rows($accesories);

            include_once "../View/AccesoriosEquipo.php";
        }

        elseif($action == 'viewAddAccesories'){

            $id = $data->{'id'};

            $category = $data->{'category'};

            include_once ('https://taller-ta.herokuapp.com/View/AddAccesoriesEquipment.php');
        }
    }
}

elseif($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['action']) && isset($_POST['data'])){
        $action = $_POST['action'];
        $data = json_decode($_POST['data']);

       if($action == "filter"){

            include_once ('../Model/EquipmentModel.php');

            $equipment = new EquipmentModel();

            $category = $data->{'category'};

            $filter = $data->{'filter'};

            $filterType = $data->{'filterType'};

            switch($category){

                case "accesorio":
                    $title = "Accesorios";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case "audio":
                    $title = "Equipos de audio";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case "cables":
                    $title = "Cables";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case "edicion":
                    $title = "Equipos de edición";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case "video":
                    $title = "Equipos de video";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case "red":
                    $title = "Equipos de red";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;

                case "electrico":
                    $title = "Equipos eléctricos";
                    $list = validateFilter($filterType, $equipment, $filter, $category);
                    $num_filas = mysqli_num_rows($list);
                    break;


                default:
                    $title = "No se pudo cargar la lista";
                    break;
            }
            include_once ("../View/ListaEquipos.php");
       }

    }
    elseif(isset($_POST)){

        include_once ('../Model/EquipmentModel.php');

        $equipment = new EquipmentModel();

        $equipment->marca = $_POST['marca'];
        $equipment->modelo = $_POST['modelo'];
        $equipment->descripcion = $_POST['descripcion'];
        $equipment->codigo_ta = $_POST['codigoTA'];
        $equipment->num_serie = $_POST['serie'];
        $equipment->fecha_inst = $_POST['fechaInst'];
        $equipment->proveedor = $_POST['proveedor'];
        $equipment->id_estado = $_POST['estado'];
        $equipment->id_tipo_equi = $_POST['tipoEquipo'];
        $equipment->responsable = $_POST['responsable'];
        $equipment->departamento = $_POST['departamento'];
        $equipment->disponibilidad = $_POST['disponibilidad'];
        $equipment->observacion = $_POST['observacion'];

        if(isset($_FILES['files'])){
            // Count total files
            $countfiles = count($_FILES['files']['name']);

            // Upload Location
            $upload_location = "../Files/";

            // To store uploaded files path
            $equipment->file_array = array();

            $row = mysqli_fetch_assoc($equipment->CrearEquipo($equipment));
            $equipment->result = $row["resultado"];

            // Loop all files
            for($index = 0;$index < $countfiles;$index++){

                if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
                    // File name
                    $filename = $_FILES['files']['name'][$index];

                    // Get extension
                    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                    // Valid image extension
                    $valid_ext = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt');

                    // Check extension
                    if(in_array($ext, $valid_ext)){

                        // File path
                        $path = $upload_location.$filename;

                        // Upload file
                        if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                            $equipment->file_array[] = $path;

                        }
                    }
                }
            }
            echo json_encode($equipment);
            die;
        }

        else{
            $row = mysqli_fetch_assoc($equipment->CrearEquipo($equipment));

            $equipment->result = $row["resultado"];
        }

        echo json_encode($equipment);

        die;
    }
}

//Funcion para validar los datos ingresados al filtro
function validateFilter($filterType, $resultado, $filter, $category){

    if($filterType == 'descripcion'){
        $busqueda = $resultado->GetEquipmentByDesc($filter, $category);
    }

    if($filterType == 'marca'){
        $busqueda = $resultado->GetEquipmentByMarca($filter, $category);
    }

    if($filterType == 'serie'){
        $busqueda = $resultado->GetEquipmentBySerie($filter, $category);
    }

    if($filterType == 'departamento'){
        $busqueda = $resultado->GetEquipmentByDep($filter, $category);
    }

    if($filterType == 'estado'){
        $busqueda = $resultado->GetEquipmentByEst($filter, $category);
    }

    if($filterType == 'empty'){
        $busqueda = $resultado->GetEquimentByType($category);
    }

    return $busqueda;
}