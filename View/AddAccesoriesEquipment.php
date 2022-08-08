<form id="form" method="post" action="../uploadFile.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="add-equipment-header">
                <div id="btnRegresar" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </div>
                <h1>Nuevo registro:</h1>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col-6">
                <label for="txtSerie" class="col-sm-12 col-form-label">Número de serie:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtSerie" >
                </div>
            </div>

            <div class="mb-2 col-6">
                <label for="txtSerieTA" class="col-sm-12 col-form-label">Número de serie TA:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtSerieTA"  >
                </div>
            </div>

        </div>


        <div class="mb-2 row">
            <div class="mb-2 col-sm-6">
                <label for="txtDescripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="txtDescripcion" rows="3"></textarea>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col-6">
                Diponibilidad
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault1" id="rbDispSi" checked>
                    <label class="form-check-label" for="rbDispSi">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault1" id="rbDispNo">
                    <label class="form-check-label" for="rbDispNo">
                        No
                    </label>
                </div>
            </div>

        </div>

        <div class="mb-2">
            <label for="file" class="form-label">Adjuntos:</label>
            <input class="form-control" type="file" id="file" name="image">
        </div>


        <div class="col-auto">
            <button id="btnSaveAccesories" type="submit" class="btn btn-outline-success" style="margin-top: 25px; float: right; margin-bottom:25px;"  >Guardar</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){

        const msg = {
            category: '',
            id: ''
        };

        $('#btnRegresar').click(function () {
            msg.id = '<?=$GLOBALS['id']?>';
            msg.category = '<?=$GLOBALS['category']?>';

            $.ajax({
                type:'GET',
                url: 'Controller/EquipoController.php',
                data: {data:JSON.stringify(msg), action:'viewAccesories'},
                success: function(response){
                    $('#content').html(response);
                }
            });
        });
    })
</script>