<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1><?=$GLOBALS['title']?></h1>
            </div>
            <div class="col-lg-1" id="btnAddTransmision" role="button" class="text-danger" data-toggle="tooltip" data-placement="bottom" title="Nueva transmisión">
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
        <table id="tblTransmisiones" class="table table-hover">
            <thead style="background-color:  #005aa9; color:white;">
            <tr>
                <td><strong>Cod.</strong></td>
                <td><strong>Ubicación</strong></td>
                <td><strong>Responsable</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Unidad móvil</strong></td>
                <td><strong>Fecha inicio</strong></td>
                <td><strong>Fecha fin</strong></td>
                <td><strong>Observación</strong></td>
                <td></td>


            </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_assoc($GLOBALS['list'])) {

                ?>
                <tr>
                    <td class="idTransmision"><?php echo $row["id_transmision"]; ?> </td>
                    <td><?php echo $row["ubicacion"]; ?> </td>
                    <td><?php echo $row["tecnico"]; ?> </td>
                    <td><?php echo $row["email"]; ?> </td>
                    <td><?php echo $row["unidad_movil"]; ?> </td>
                    <td><?php echo $row["fecha_inicio"]; ?> </td>
                    <td><?php echo $row["fecha_fin"]; ?> </td>
                    <td><?php echo $row["observaciones"]; ?> </td>   
                    <td>
                        <a id="btnListaEquipos" role="button" class="text-success" data-toggle="tooltip" data-placement="bottom" title="Listado de equipos">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </a>
                    </td>
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
    $(document).ready(function(){
        const msg = {
            category: '',
            id: ''
        };

        $("#btnAddTransmision").click(function () {

            $.ajax({
                type:'GET',
                url: 'Controller/TransmisionController.php',
                data: {data:JSON.stringify(''), action: 'viewAddTransmision'},
                success: function(response){
                    $('#content').html(response);
                }
            });
        });

        $('#tblTransmisiones').on('click','#btnListaEquipos', function(){
            const row =  $(this).closest('tr');
            msg.id = row.find("td.idTransmision").text();
            $.ajax({
                type:'GET',
                url: 'Controller/TransmisionController.php',
                data: {data:JSON.stringify(msg), action:'listarAccesorios'},
                success: function(response){
                    $('#content').html(response);
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        });
    })
</script>