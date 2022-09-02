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

    if(isset($_POST)){
        include_once ('../Model/TransmisionModel.php');

        $transmision = new TransmisionModel();

        if($_POST['action'] == 'addTransmision' ){
            $transmision->nombre = $_POST['nombre'];
            $transmision->ubicacion = $_POST['ubicacion'];
            $transmision->tecnico = $_POST['tecnico'];
            $transmision->email = $_POST['email'];
            $transmision->movil = $_POST['movil'];
            $transmision->inicio = $_POST['inicio'];
            $transmision->fin = $_POST['fin'];
            $transmision->obs = $_POST['observacion'];
          
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
                $row = mysqli_fetch_assoc($transmision->uspCrearTransmision($transmision));

                $transmision->result = $row["resultado"];
            }

            echo json_encode($transmision);

            die;
        }

    }
}





