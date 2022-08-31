<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                <div id="btnRegresar" role="button" data-toggle="tooltip" data-placement="bottom" title="Regresar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </div>
            </div>
            <div class="col-lg-10">
                <h1><?=$GLOBALS['title']?></h1>
            </div>
            <div class="col-lg-1" id="btnAddEquipo" role="button"  data-toggle="tooltip" data-placement="bottom" title="Nuevo Accesorio">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#ff9000" class="bi bi-plus-circle-fill float-end" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container-fluid">
        <h3>Filtar por:</h3>

        <div class="row g-3 form-inline d-flex align-items-center justify-content-between">

            <div class="col-auto">
                <label for="txtResponsable">Responsable:</label>
                <input type="text" class="form-control" id="txtResponsable" placeholder="Nombre responsable:">
            </div>

            <div class="col-auto">
                <button type="submit" id="btnFiltrar" class="btn btn-outline-success" style="margin-top: 25px;" >Consultar</button>
            </div>
        </div>
    </div>

    <br/>
    <div class="table-responsive">
        <table id="tblEquTransmisiones" class="table table-hover">
            <thead style="background-color:  #005aa9; color:white;">
            <tr>
                <td><strong>Cod.</strong></td>
                <td><strong>Serie</strong></td>
                <td><strong>SerieTA</strong></td>
                <td><strong>Descripción</strong></td>

            </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_assoc($GLOBALS['list'])) {

                ?>
                <tr>
                    <td class="idEquTrans"><?php echo $row["id_lista"]; ?> </td>
                    <td><?php echo $row["serie"]; ?> </td>
                    <td><?php echo $row["serieTA"]; ?> </td>
                    <td><?php echo $row["descripcion"]; ?> </td>
                </tr>
                <?php
            }
            ?>
            <thead>
            <tr class="text-center" style="background-color: #005aa9; color: white">
                <td colspan="16" class="text-white"><strong>Se encontraron <?= $GLOBALS['num_filas'] ?> registros.</strong></td>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
       const msg = {
           id:''
       }
       $('#btnAddEquipo').click(function(){
           msg.id = '<?=$GLOBALS['id']?>';
           $.ajax({
               type:'GET',
               url: 'Controller/TransmisionController.php',
               data: { data:JSON.stringify(msg), action:'viewAddEquipo'},
               success: function(response){
                   $('#content').html(response);
               }
           });

       });

       $('#btnRegresar').click(function(){
           $.ajax({
               type:'GET',
               url: 'Controller/TransmisionController.php',
               data: { data:JSON.stringify(''), action:'listarTransmisiones'},
               success: function(response){
                   $('#content').html(response);
               }
           });
       });
   })
</script>
