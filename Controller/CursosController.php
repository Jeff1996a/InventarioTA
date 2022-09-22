<?php

$action = '';
$data = '';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['action']) && isset($_GET['data']) ){

        $action = $_GET['action'];

        $data = json_decode($_GET['data']);

        if($action == 'listarCursos' ){

            include_once ('../Model/CursosModel.php');

            $cursos = new CursosModel();

            $title = "Soportes";

            $list = $cursos->LeerCursos();

            $num_filas = mysqli_num_rows($list);

            include_once ("../View/ListaSoportes.php");
        }

        //Formulario para crear una nueva transmision
        elseif($action == 'viewAddCurso'){

            include_once "../View/CrearSoporte.php";
        }
    }

}

////MÉTODOS POST//////
elseif($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['action']) && isset($_POST['data'])){

    }

    elseif(isset($_POST)){
        include_once ('../Model/CursosModel.php');

        $curso = new CursosModel();

        if($_POST['action'] == 'addCurso'){
            $curso->nombre = $_POST['nombre'];
            $curso->descripcion = $_POST['descripcion'];
            $curso->url = $_POST['url'];
          
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
                $row = mysqli_fetch_assoc($curso->CrearCurso($curso));

                $curso->result = $row["resultado"];
            }

            echo json_encode($curso);

            die;
        }
    }

}