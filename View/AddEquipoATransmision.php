<form method="post" action="" enctype="multipart/form-data" id="form-validation">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="add-equipment-header">
                <div id="btnRegresar" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </div>
                <h1>Agregar equipo</h1>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col-6">
                <label for="txtTecnico" class="col-sm-12 col-form-label">Numero de serie:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtSerie" name="txtSerie" required>
                </div>
            </div>

            <div class="mb-2 col-6">
                <label for="txtCorreo" class="col-sm-12 col-form-label">Código de TA:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtCodTa" name="txtCodTa" required>
                </div>
            </div>

        </div>

        <div class="mb-2">
            <label for="txtObservacion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="txtObservacion" rows="3" name="txtObservacion" required></textarea>
        </div>

        <div class="col-auto">
            <button id="btnSaveHistory" type="submit" class="btn btn-outline-success" style="margin-top: 25px; float: right; margin-bottom:25px;" >Guardar</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){

        const msg = {
            id: ''
        };
        $("#form-validation").validate({
            rules:{
                txtSerie: {
                    required: true
                },
                txtCodTa: {
                    required:true
                }
            },
            messages:{
                txtSerie: {
                    required: "Ingrese el número de serie"
                },

                txtCodTa: {
                    required: "Ingrese el código de TA"
                }
            }
        });

        $('#btnRegresar').click(function(){

            msg.id = '<?=$GLOBALS['id']?>';
            $.ajax({
                type:'GET',
                url: 'Controller/TransmisionController.php',
                data: { data:JSON.stringify(msg), action:'listarAccesorios'},
                success: function(response){
                    $('#content').html(response);
                }
            });
        });
    })
</script>