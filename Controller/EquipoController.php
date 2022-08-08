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

            include_once ('../View/Historial_mantenimiento.php');
        }

        elseif($action == 'viewAddHistory'){

            $id = $data->{'id'};

            $category = $data->{'category'};

            include_once ('../View/AddHistoryRecord.php');
        }

        elseif($action == "viewAccesories"){

            include_once('../Model/EquipmentModel.php');

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

            include_once ('../View/AddAccesoriesEquipment.php');
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

            if($equipment->createEquipment($equipment)){
                echo '<script language="JavaScript">';
                echo 'alert("Registro exitoso");';
                echo '</script>';
            }

            else{
                echo '<script language="JavaScript">';
                echo 'alert("No se pudo realizar el registro");';
                echo '</script>';

                include_once ('../View/AddHistoryRecord.php');
            }
        }

        elseif($action == "filter"){

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
