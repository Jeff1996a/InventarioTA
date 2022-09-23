<form action="" method="post" id="addEquipmentForm" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="add-equipment-header">
                <div id="btnRegresar" role="button" data-toggle="tooltip" data-placement="bottom" title="Regresar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </div>
                <h1>Nuevo equipo:</h1>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col">
                <label for="txtMarca" class="col-sm-2 col-form-label">Marca:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtMarca" name="marca" placeholder="Ejm: DELL" style="text-transform:uppercase">
                </div>
            </div>
            <div class="mb-2 col">
                <label for="txtModelo" class="col-sm-2 col-form-label">Modelo:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtModelo" name="modelo" style="text-transform:uppercase">
                </div>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col">
                <label for="txtSerieTa" class="col-sm-3 col-form-label">Código TA:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtSerieTa" name="codigoTA" style="text-transform:uppercase">
                </div>
            </div>

            <div class="mb-2 col">
                <label for="txtSerie" class="col-sm-2 col-form-label">Serie:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="txtSerie" name="serie" style="text-transform:uppercase">
                </div>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-3 col">
                <label for="dpFechaInst" class="col-sm-3 col-form-label">Fecha instalación:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dpFechaInst" name="fechaInst">
                </div>
            </div>

            <div class="mb-2 col">
                <label for="txtProveedor" class="col-sm-2 col-form-label">Proveedor:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtProveedor" name="proveedor" style="text-transform:uppercase">
                </div>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col">
                <label for="txtResponsable" class="col-sm-2 col-form-label">Responsable:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtResponsable" name="responsable" style="text-transform:uppercase">
                </div>
            </div>

            <div class="mb-2 col">
                <label for="txtUbicacion" class="col-sm-2 col-form-label">Departamento:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtDepartamento" name="ubicacion" style="text-transform:uppercase">
                </div>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col">
                <label for="cbEstado">Estado:</label>
                <select class="form-select btn-outline-success" aria-label="Default select example" id="cbEstado" name="estado">
                    <option selected>Seleccione un estado</option>
                    <option value="1">Almacenado</option>
                    <option value="2">Averiado</option>
                    <option value="3">Óptimo</option>
                    <option value="3">Operativo</option>
                </select>
            </div>

            <div class="mb-2 col">
                <label for="cbTipoEquipo">Tipo de Equipo:</label>
                <select class="form-select btn-outline-success" aria-label="Default select example" id="cbTipoEquipo" name="tipoEquipo">
                    <option selected>Seleccione una categoría</option>
                    <option value="1">Audio</option>
                    <option value="2">Cables</option>
                    <option value="3">Edición</option>
                    <option value="4">Electricidad</option>
                    <option value="5">Red</option>
                    <option value="6">Video</option>
                </select>
            </div>
        </div>

        <div class="mb-2 row">
            <label for="txtDescripcion" class="col-form-label">Descripción:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="txtDescripcion"  placeholder="Ejm: CÁMARA" name="descripcion" style="text-transform:uppercase">
            </div>
        </div>

        <div class="mb-2">
            <label for="txtObservacion" class="form-label">Observación:</label>
            <textarea class="form-control" id="txtObservacion" rows="3" name="observacion" style="text-transform:uppercase"></textarea>
        </div>

        <!--
            <div class="mb-2">
                <label for="formFileMultiple" class="form-label">Subir adjuntos:</label>
                <input class="form-control" type="file" id="files" name="files[]" multiple>
            </div>
        -->
        

        <div class="col-auto">
            <button id="btnAgregarEquipo" type="submit" class="btn btn-outline-success" style="margin-top: 25px; float: right; margin-bottom:25px;" >Guardar</button>
        </div>
    </div>
</form>
<div id='preview'></div>
<script type="text/javascript">
    $(document).ready(function () {
        const msg = {
            category: ''
        };

        //Validaciones
        const validation = $("#addEquipmentForm").validate({
            rules:{
                marca: {
                    required: true
                },
                modelo:{
                    required: true
                },
                codigoTA: {
                    required: true
                },
                serie: {
                    required:true
                },
                fechaInst: {
                    required:true,
                    date: true
                },
                proveedor:{
                    required: true
                },
                responsable: {
                    required: true
                },
                ubicacion:{
                    required: true
                },
                estado:{
                    required: true
                },
                descripcion: {
                    required: true
                }
            },
            messages:{
                marca: {
                    required: "Ingrese la marca!"
                },
                modelo: {
                    required: "Ingrese el modelo!"
                },
                codigoTA :{
                    required: "Ingrese el código !"
                },
                serie: {
                    required: "Ingrese el número!"
                },
                fechaInst: {
                    required: "Seleccione la fecha!",
                    date: "Fecha inválida"
                },
                proveedor:{
                    required: "Ingrese el proveedor!"
                },
                responsable:{
                    required: "Ingrese un responsable!"
                },
                ubicacion: {
                    required: "Ingrese el departamento!"
                },
                estado: {
                    required: "Seleccione el estado del equipo!"
                },
                descripcion:{
                    required: "Ingrese una descripción!"
                }
            },
            submitHandler: function(e){
                e.preventDefault();
                console.log("ingrese los datos");
            }
        });

        $('#btnRegresar').click(function () {
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
        
        
    })
</script>
