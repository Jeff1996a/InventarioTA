<div class="container-fluid">
    <div class="history-header">
        <div id="btnRegresar" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </div>
        <h1><?=$GLOBALS['title']?></h1>
        <div id="btnAddHistory" role="button">
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
            <td><strong>Cod. Equipo</strong></td>
            <td><strong>Modelo</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>Serie TA</strong></td>
            <td><strong>Serie</strong></td>
            <td><strong>Técnico</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Ult.Mantenimiento</strong></td>
            <td><strong>Fecha ingreso</strong></td>
            <td><strong>Problema</strong></td>
            <td><strong>Solución</strong></td>
            <td><strong>Observación</strong></td>

        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($GLOBALS['equipmentList'])) {

            ?>
            <tr>
                <td class="idHistorial"><?php echo $row["id_hist_mant"]; ?> </td>
                <td><?php echo $GLOBALS['idEquipment']; ?> </td>
                <td><?php echo $row["marca"]; ?> </td>
                <td><?php echo $row["modelo"]; ?> </td>
                <td><?php echo $row["descripcion"]; ?> </td>
                <td><?php echo $row["num_serie_ta"]; ?> </td>
                <td><?php echo $row["num_serie"]; ?> </td>
                <td><?php echo $row["tecnico"]; ?> </td>
                <td><?php echo $row["email"]; ?> </td>
                <td><?php echo $row["fecha_ult_mant"]; ?> </td>
                <td><?php echo $row["fecha_ingreso"]; ?> </td>
                <td><?php echo $row["problema"]; ?> </td>
                <td><?php echo $row["solucion"]; ?> </td>
                <td><?php echo $row["observacion"]; ?> </td>
            </tr>
            <?php
        }
        ?>
        <thead>
        <tr class="text-center text-white" style="background-color: #005aa9;">
            <td colspan="16"><strong>Se encontraron <?= $GLOBALS['num_filas'] ?> registros.</strong></td>
        </tr>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var msg = {
            tipo: '',
            action: '',
            param: '',
            filter: ''
        }

        $("#btnRegresar").click(function(){
            msg.tipo = '<?=$GLOBALS['tipo_equipo']?>';
            msg.action = 'Lista';

            $.ajax({
                type:'POST',
                url: 'Controller/EquipmentController.php',
                data: msg,
                success: function(response){
                    $('#content').html(response);
                }
            });
        });

        $("#btnAddHistory").click(function(){
            msg.param = '<?=$GLOBALS['idEquipment']?>';
            msg.action = 'add history';

            $.ajax({
                type:'POST',
                url: 'Controller/EquipmentController.php',
                data: msg,
                success: function(response){
                    $('#content').html(response);
                }
            });
        });
    })
</script>