<?php
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

            include_once ("../View/ListaEquipos.php");
        }

        elseif ($action == 'viewAddEquipment'){
            $category = $data->{'category'};
            include_once ('../View/AddEquipment.php');
        }
    }
}

elseif($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['action']) && isset($_POST['data'])){
        $action = $_POST['action'];
        $data = json_decode($_POST['data']);

        if($action == 'saveEquipment'){
            include_once ('../Model/EquipmentModel.php');

            $equipment = new EquipmentModel();

            $equipment->marca = $data->{'marca'};
            $equipment->modelo = $data->{'modelo'};
            $equipment->codigo_ta = $data->{'codigoTA'};
            $equipment->num_serie = $data->{'serie'};
            $equipment->fecha_inst = $data->{'fechaInst'};
            $equipment->proveedor = $data->{'proveedor'};
            $equipment->responsable = $data->{'responsable'};
            $equipment->id_estado = $data->{'estado'};
            $equipment->id_tipo_equi = $data->{'tipoEquipo'};
            $equipment->descripcion = $data->{'descripcion'};
            $equipment->observacion = $data->{'observacion'};
            $equipment->ubicacion = $data->{'ubicacion'};

            $equipment->insertEquipment($equipment);
        }
    }
}

