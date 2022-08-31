<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-11">
                <h1><?=$GLOBALS['title']?></h1>
            </div>
            <div class="col-sm-1" role="button" id="btnAddEquipment">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#ff9000" class="bi bi-plus-circle-fill float-end" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
            </div>
        </div>
    </div>
    <hr/>

    <div class="container-fluid">
        <h3>Buscar por:</h3>

        <div class="row  form-inline d-flex align-items-center justify-content-between">

            <div class="col-sm-auto">
                <label for="txtEquipo">Equipo:</label>
                <input type="text" class="form-control" id="txtEquipo" placeholder="Ejm: CÁMARA" style="text-transform:uppercase">
            </div>

            <div class="col-sm-auto">
                <label for="txtMarca">Marca:</label>
                <input type="text" class="form-control" id="txtMarca" placeholder="Ejm: DELL" style="text-transform:uppercase">
            </div>

            <div class="col-sm-auto">
                <label for="txtFiltroSerie">Número de serie:</label>
                <input type="text" class="form-control" id="txtFiltroSerie" placeholder="Ejm: 222214AA" style="text-transform:uppercase">
            </div>

            <div class="col-sm-auto">
                <label for="txtDepartamento">Departamento:</label>
                <input type="text" class="form-control" id="txtDepartamento" placeholder="Ejm: PRODUCCIÓN" style="text-transform:uppercase">
            </div>

            <div class="col-sm-auto">
                <label for="cbEstado">Estado:</label>
                <select id="cbEstado" class="form-select btn-outline-success" aria-label="Default select example" >
                    <option selected>Seleccione un estado</option>
                    <option value="1">Almacenado</option>
                    <option value="2">Averiado</option>
                    <option value="3">Óptimo</option>
                    <option value="3">Operativo</option>
                </select>
            </div>

            <div class="col-sm-auto">
                <button type="submit" id="btnBuscar" class="btn btn-outline-success" style="margin-top: 25px;" >Buscar</button>
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
                    <td><?php echo $row["departamento"]; ?> </td>
                    <td><?php echo $row["estado"]; ?> </td>
                    <td><?php echo $row["tipo"]; ?> </td>
                    <td>
                        <a id="btnHistorial" role="button" data-toggle="tooltip" data-placement="bottom" title="Historial">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                        </a>
                    </td>
                    <td><a id="btnAccesorios" href="#">Accesorios</a></td>
                    <td><a id="btnEliminar" href="#">Adjuntos</a></td>
                    <td><a id="btnEliminar" href="#">Eliminar</a></td>
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
          id: '',
          filter: '',
          filterType: ''
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

      $('#tblEquipos').on('click','#btnAccesorios', function(){
          const row =  $(this).closest('tr');
          msg.id= row.find("td.idEquipo").text();

          msg.category = '<?=$GLOBALS['category']?>';

          $.ajax({
              type:'GET',
              url: 'Controller/EquipoController.php',
              data: {data: JSON.stringify(msg), action:'viewAccesories'},
              success: function(response){
                  $('#content').html(response);
              }
          });
      });

      //Filtrar por marca
      $("#txtMarca").on('keydown', function (e) {

          const keycode = e.keyCode || e.which;

          if (keycode == 13) {

              const filter = $('#txtMarca').val();

              msg.category = '<?=$GLOBALS['category']?>';

              if(filter != ''){
                  msg.filter = filter;
                  msg.filterType = 'marca';
              }

              $.ajax({
                  type:'POST',
                  url: 'Controller/EquipoController.php',
                  data: {data: JSON.stringify(msg), action: 'filter'},
                  success: function(response){
                      $('#content').html(response);
                  }
              });
          }
      });

      //Filtrar por serie
      $("#txtFiltroSerie").on('keydown', function (e) {

          const  keycode = e.keyCode || e.which;

          if (keycode == 13) {

              const filter = $('#txtFiltroSerie').val();

              msg.category = '<?=$GLOBALS['category']?>';

              if(filter != ''){
                  msg.filter = filter;
                  msg.filterType = 'serie';
              }

              $.ajax({
                  type:'POST',
                  url: 'Controller/EquipoController.php',
                  data: {data: JSON.stringify(msg), action: 'filter'},
                  success: function(response){
                      $('#content').html(response);
                  }
              });

          }
      });

      //Filtro por equipo
      $("#txtEquipo").on('keydown', function (e) {
          const keycode = e.keyCode || e.which;

          if (keycode == 13) {
              const filter = $('#txtEquipo').val();

              msg.category = '<?=$GLOBALS['category']?>';

              if(filter != ''){
                  msg.filter = filter;
                  msg.filterType = 'descripcion';
              }

              $.ajax({
                  type:'POST',
                  url: 'Controller/EquipoController.php',
                  data: {data: JSON.stringify(msg), action: 'filter'},
                  success: function(response){
                      $('#content').html(response);
                  }
              });
          }
      });

      $("#txtDepartamento").on('keydown', function (e) {
          const keycode = e.keyCode || e.which;

          if (keycode == 13) {
              const filter = $('#txtDepartamento').val();

              msg.category = '<?=$GLOBALS['category']?>';

              if(filter != ''){
                  msg.filter = filter;
                  msg.filterType = 'departamento';
              }

              $.ajax({
                  type:'POST',
                  url: 'Controller/EquipoController.php',
                  data: {data: JSON.stringify(msg), action: 'filter'},
                  success: function(response){
                      $('#content').html(response);
                  }
              });
          }
      });

      $("#cbEstado").on('change', function (e) {

          const filter = $('#cbEstado option:selected').text();

          msg.category = '<?=$GLOBALS['category']?>';

          if(filter != ''){
              msg.filter = filter;
              msg.filterType = 'estado';
          }

          $.ajax({
              type:'POST',
              url: 'Controller/EquipoController.php',
              data: {data: JSON.stringify(msg), action: 'filter'},
              success: function(response){
                  $('#content').html(response);
              }
          });
      });

      //Permite filtrar cada lista mediante un conjunto de opciones
      $('#btnBuscar').click(function (e) {

          const filter_equi = $('#txtEquipo').val();
          const filter_marca = $('#txtMarca').val();
          const filter_serie = $('#txtFiltroSerie').val();
          const filter_dep = $('#txtDepartamento').val();
          const filter_state = $('#cbEstado option:selected').text();

          msg.category = '<?=$GLOBALS['category']?>';


          if(filter_equi != '' && filter_marca == '' && filter_dep == '' && filter_state=='Seleccione un estado' && filter_serie == ''){
              msg.filter = filter_equi;
              msg.filterType = 'descripcion';

          }

          if(filter_equi == '' && filter_marca != '' && filter_dep == '' && filter_state=='Seleccione un estado' && filter_serie == ''){
              msg.filter = filter_marca;
              msg.filterType = 'marca';
          }

          if(filter_equi == '' && filter_marca == '' && filter_dep == '' && filter_state=='Seleccione un estado' && filter_serie != ''){
              msg.filter = filter_serie;
              msg.filterType = 'serie';
          }

          if(filter_equi == '' && filter_marca == '' && filter_dep != '' && filter_state=='Seleccione un estado' && filter_serie == ''){
              msg.filter = filter_dep;
              msg.filterType = 'departamento';
          }

          if(filter_equi == '' && filter_marca == '' && filter_dep == '' && filter_state !='Seleccione un estado' && filter_serie == ''){
              msg.filter = filter_state;
              msg.filterType = 'estado';
          }

          if(filter_equi == '' && filter_marca == '' && filter_dep == '' && filter_state =='Seleccione un estado' && filter_serie == ''){
              msg.filterType = 'empty';
          }

          $.ajax({
              type:'POST',
              url: 'Controller/EquipoController.php',
              data: {data:JSON.stringify(msg), action: 'filter'},
              success: function(response){
                  $('#content').html(response);
              }
          });
      });
  })
</script>