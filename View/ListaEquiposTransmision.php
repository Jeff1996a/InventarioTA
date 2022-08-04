<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1><?=$GLOBALS['title']?></h1>
            </div>
            <div class="col-lg-1" role="button" id="btnAddTransmission">
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
            while ($row = mysqli_fetch_assoc($GLOBALS['equipmentList'])) {

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
