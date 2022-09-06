<div class="container-fluid">
    <div class="history-header">
        <div id="btnRegresar" role="button"  data-toggle="tooltip" data-placement="bottom" title="Regresar">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </div>
        <h1><?=$GLOBALS['title']?></h1>
        <div id="btnAddHistory" role="button" data-toggle="tooltip" data-placement="bottom" title="Agregar registro">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-plus-circle-fill float-end" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
        </div>
    </div>
</div>
<hr/>
<br/>

<div class="table-responsive">
    <table id="tblEquipos" class="table table-hover">
        <thead style="background-color: #005aa9;" class="text-white">
        <tr>
            <td><strong>Cod.</strong></td>
            <td><strong>Marca</strong></td>
            <td><strong>Modelo</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>Técnico</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Ult.Mantenimiento</strong></td>
            <td><strong>Fecha ingreso</strong></td>
            <td><strong>Problema</strong></td>
            <td><strong>Solución</strong></td>
            <td><strong>Observación</strong></td>
            <td></td>

        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($GLOBALS['equipmentList'])) {

            ?>
            <tr>
                <td class="idHistorial"><?php echo $row["id_hist_mant"]; ?> </td>
                <td><?php echo $GLOBALS['id']; ?> </td>
                <td><?php echo $row["marca"]; ?> </td>
                <td><?php echo $row["modelo"]; ?> </td>
                <td><?php echo $row["descripcion"]; ?> </td>
                <td><?php echo $row["tecnico"]; ?> </td>
                <td><?php echo $row["email"]; ?> </td>
                <td><?php echo $row["fecha_ult_mant"]; ?> </td>
                <td><?php echo $row["fecha_ingreso"]; ?> </td>
                <td><?php echo $row["problema"]; ?> </td>
                <td><?php echo $row["solucion"]; ?> </td>
                <td><?php echo $row["observacion"]; ?> </td>
                <td>
                    <a id="btnEliminar" role="button" class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar historial">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </a>     
                </td>
            </tr>
            <?php
        }
        ?>
        <thead>
        <tr class="text-center text-white" style="background-color: #005aa9;">
            <td colspan="17"><strong>Se encontraron <?= $GLOBALS['num_filas'] ?> registros.</strong></td>
        </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        const msg = {
            category: '',
            id: ''
        };

        $("#btnRegresar").click(function(){
            msg.category = '<?=$GLOBALS['category']?>';

            $.ajax({
                type:'GET',
                url: 'Controller/EquipoController.php',
                data: {data: JSON.stringify(msg), action:'listarEquipos'},
                success: function(response){
                    $('#content').html(response);
                }
            });
        });

        $("#btnAddHistory").click(function(){
            msg.id = '<?=$GLOBALS['id']?>';
            msg.category = '<?=$GLOBALS['category']?>';
            $.ajax({
                type:'GET',
                url: 'Controller/EquipoController.php',
                data: {data:JSON.stringify(msg), action:'viewAddHistory'},
                success: function(response){
                    $('#content').html(response);
                }
            });
        });
    })
</script>