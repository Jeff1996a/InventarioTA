<?php
$action = '';

$data = '';

//Metodos get para obtener vistas de transmisiones
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['action']) && isset($_GET['data'])){

        $action = $_GET['action'];

        $data = json_decode($_GET['data']);

        //Listado de transmisiones
        if($action == 'listarTransmisiones'){

            include_once ('../Model/TransmisionModel.php');

            $transmision = new TransmisionModel();

            $title = "Transmisiones";

            $list = $transmision->GetTransmisionList();

            $num_filas = mysqli_num_rows($list);

            include_once ("../View/ListaTransmisiones.php");
        }

        //Formulario para crear una nueva transmision
        elseif($action == 'viewAddTransmision'){

            include_once "../View/AddTransmission.php";
        }

        //Formulario para crear una nueva transmision
        elseif($action == 'viewAddEquipo'){

            $id = $data->{'id'};

            include_once "../View/AddEquipoATransmision.php";
        }

        //Lista de equipos utilizados en transmisiones
        elseif($action == "listarAccesorios"){

            include_once ('../Model/TransmisionModel.php');

            $transmision = new TransmisionModel();

            $id = $data->{'id'};

            $title = "Lista de equipos";

            $list = $transmision->GetEquipmentListByTransmision($id);

            $num_filas = mysqli_num_rows($list);

            include_once "../View/ListaEquiposTransmision.php";
        }
    }


}

elseif($_SERVER["REQUEST_METHOD"] == "POST"){

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
}





