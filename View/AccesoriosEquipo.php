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
    <table id="tblAccesorios" class="table table-hover">
        <thead style="background-color: #005aa9;" class="text-white">
        <tr>
            <td><strong>Cod.</strong></td>
            <td><strong>Descripción</strong></td>
            <td><strong>Disponibilidad</strong></td>
            <td><strong>Serie</strong></td>
            <td><strong>Serie TA</strong></td>
            <td></td>
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
                <td>
                    <a id="btnEliminar" role="button" class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar accesorio">
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

        //Eliminar equipos
      $('#tblAccesorios').on('click', '#btnEliminar', function () {
            const row =  $(this).closest('tr');
            msg.id= row.find("td.idAccesorio").text();

            msg.category = '<?=$GLOBALS['category']?>';

            if (confirm('Desea eliminar el registro')) {
                $.ajax({
                    type: 'POST',
                    url: 'Controller/EquipoController.php',
                    data: {data: JSON.stringify(msg), action:'eliminarAccesorio'},
                    success: function (result) {
                        $.ajax({
                            type:'GET',
                            url: 'Controller/EquipoController.php',
                            data: {data: JSON.stringify(msg), action:'viewAccesories'},
                            success: function(response){
                                $('#content').html(response);
                            }
                        });
                    },
                    error: function (result) {
                        alert('Ops! No se pudo eliminar el accesorio');
                    }
                });
            }
        });



    })
</script>