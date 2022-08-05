<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1><?=$GLOBALS['title']?></h1>
            </div>
            <div class="col-lg-1" role="button" id="btnAddEquipment">
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
                <label for="txtEquipo">Equipo:</label>
                <input type="text" class="form-control" id="txtEquipo" placeholder="Ejm: CÁMARA">
            </div>

            <div class="col-auto">
                <label for="txtMarca">Marca:</label>
                <input type="text" class="form-control" id="txtMarca" placeholder="Ejm: DELL">
            </div>

            <div class="col-auto">
                <label for="txtFiltroSerie">Número de serie:</label>
                <input type="text" class="form-control" id="txtFiltroSerie" placeholder="Ejm: 222214AA">
            </div>

            <div class="col-auto">
                <label for="txtDepartamento">Departamento:</label>
                <input type="text" class="form-control" id="txtDepartamento" placeholder="Ejm: PRODUCCIÓN">
            </div>

            <div class="col-auto">
                <label for="cbEstado">Estado:</label>
                <select id="cbEstado" class="form-select btn-outline-success" aria-label="Default select example">
                    <option selected>Seleccione un estado</option>
                    <option value="1">Almacenado</option>
                    <option value="2">Averiado</option>
                    <option value="3">Óptimo</option>
                    <option value="3">Operativo</option>
                </select>
            </div>

            <div class="col-auto">
                <button type="submit" id="btnFiltrar" class="btn btn-outline-success" style="margin-top: 25px;" >Consultar</button>
            </div>
        </div>
    </div>

    <br/>

    <div class="table-responsive">
        <table id="tblEquipos" class="table table-hover">
            <thead style="background-color:  #005aa9; color: white;">
            <tr>
                <td><strong>Cod.</strong></td>
                <td><strong>Marca</strong></td>
                <td><strong>Modelo</strong></td>
                <td><strong>Descripción</strong></td>
                <td><strong>Serie TA</strong></td>
                <td><strong>Serie</strong></td>
                <td><strong>Observación</strong></td>
                <td><strong>Fech_Inst</strong></td>
                <td><strong>Proveedor</strong></td>
                <td><strong>Responsable</strong></td>
                <td><strong>Departamento</strong></td>
                <td><strong>Estado</strong></td>
                <td><strong>Tipo</strong></td>
                <td></td>
                <td></td>

            </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_assoc($GLOBALS['list'])) {

                ?>
                <tr>
                    <td class="idEquipo"><?php echo $row["id_equipo"]; ?> </td>
                    <td><?php echo $row["marca"]; ?> </td>
                    <td><?php echo $row["modelo"]; ?> </td>
                    <td><?php echo $row["descripcion"]; ?> </td>
                    <td><?php echo $row["num_serie_ta"]; ?> </td>
                    <td><?php echo $row["num_serie"]; ?> </td>
                    <td><?php echo $row["observacion"]; ?> </td>
                    <td><?php echo $row["fecha_instalacion"]; ?> </td>
                    <td><?php echo $row["proveedor"]; ?> </td>
                    <td><?php echo $row["responsable"]; ?> </td>
                    <td><?php echo $row["nombre_departamento"]; ?> </td>
                    <td><?php echo $row["estado"]; ?> </td>
                    <td><?php echo $row["tipo"]; ?> </td>
                    <td><a id="btnHistorial" href="#">Historial</a></td>
                    <td><a id="btnAccesorioEqu" href="#">Accesorios</a></td>
                </tr>
                <?php
            }
            ?>
            <thead>
            <tr class="text-center" style="background-color: #005aa9;">
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

      $('#btnAddEquipment').click(function () {
          msg.category = '<?=$GLOBALS['category']?>';
          $.ajax({
              type:'GET',
              url: 'Controller/EquipoController.php',
              data: {data: JSON.stringify(msg), action:'viewAddEquipment'},
              success: function(response){
                  $('#content').html(response);
              }
          });
      });

      $('#tblEquipos').on('click','#btnHistorial', function(){
          const row =  $(this).closest('tr');
          msg.id= row.find("td.idEquipo").text();

          msg.category = '<?=$GLOBALS['category']?>';

          $.ajax({
              type:'GET',
              url: 'Controller/EquipoController.php',
              data: {data: JSON.stringify(msg), action:'viewHistory'},
              success: function(response){
                  $('#content').html(response);
              }
          });
      });
  })
</script>