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

            $title = "Cursos";

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