<div class="container-fluid">
    <div class="history-header">
        <div id="btnRegresar" role="button" data-toggle="tooltip" data-placement="bottom" title="Regresar">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
            </svg>
        </div>
        <h1><?=$GLOBALS['title']?></h1>
        <div id="btnAddAccesories" role="button" data-toggle="tooltip" data-placement="bottom" title="Nuevo Accesorio">
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
            <td><strong>Descripción</strong></td>
            <td><strong>Disponibilidad</strong></td>
            <td><strong>Serie</strong></td>
            <td><strong>Serie TA</strong></td>

        </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($GLOBALS['accesories'])) {

            ?>
            <tr>
                <td class="idAccesorio"><?php echo $row["id_accesorio"]; ?> </td>
                <td><?php echo $row['desc_accesorio']; ?> </td>
                <td><?php echo $row["disponibilidad"]; ?> </td>
                <td><?php echo $row["serie"]; ?> </td>
                <td><?php echo $row["serieTA"]; ?> </td>
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

        $("#btnAddAccesories").click(function(){
            msg.id = '<?=$GLOBALS['id']?>';
            msg.category = '<?=$GLOBALS['category']?>';
            $.ajax({
                type:'GET',
                url: 'Controller/EquipoController.php',
                data: {data:JSON.stringify(msg), action:'viewAddAccesories'},
                success: function(response){
                    $('#content').html(response);
                }
            });
        });





    })
</script>