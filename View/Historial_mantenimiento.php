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
                        <a id="btnActualizar" role="button" class="text-warning" data-toggle="tooltip" data-placement="bottom" title="Editar equipo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
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