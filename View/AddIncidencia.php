<form action="" method="post" id="incidencias-form">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="add-equipment-header">
                <div id="btnRegresar" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fa983a " class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </div>
                <h1>Nueva incidencia:</h1>
            </div>
        </div>

        <div class="mb-2 row">
            <div class="mb-2 col-6">
                <label for="txtReporta" class="col-sm-12 col-form-label">Quien reporta:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtReporta" name="reporta">
                </div>
            </div>

            <div class="mb-2 col-6">
                <label for="txtResponsable" class="col-sm-12 col-form-label">Responsable:</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtResponsable" name="responsable">
                </div>
            </div>

        </div>

        <div class="mb-2 row">
            <div class="mb-2 col-6">
                <label for="dpReporte" class="col-sm-6 col-form-label">Fecha reporte:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dpInicio" name="fechaReporte">
                </div>
            </div>

            <div class="mb-2 col-6">
                <label for="dpSolucion" class="col-sm-6 col-form-label">Fecha solución:</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" id="dpFin" name="fechaSolucion">
                </div>
            </div>

        </div>

        <div class="mb-2 row">
            <div class="mb-2 col-sm-6">
                <label for="txtProblema" class="form-label">Problema:</label>
                <textarea class="form-control" id="txtProblema" rows="3" name="problema"></textarea>
            </div>

            <div class="mb-2 col-sm-6">
                <label for="txtSolucion " class="form-label">Solución:</label>
                <textarea class="form-control" id="txtSolucion" rows="3" name="solucion"></textarea>
            </div>
        </div>

        <div class="mb-2">
            <label for="txtObservacion" class="form-label">Observación:</label>
            <textarea class="form-control" id="txtObservacion" rows="3"></textarea>
        </div>


        <div class="mb-2">
            <label for="file" class="form-label">Adjuntos:</label>
            <input class="form-control" type="file" id="file">
        </div>


        <div class="col-auto">
            <button id="btnGuardarIncidencia" type="submit" class="btn btn-outline-success" style="margin-top: 25px; float: right; margin-bottom:25px;" >Guardar</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function (){
        var incidencia = {
            ubi: '',
            tec:'',
            correo: '',
            uni_movil: '',
            fecha_ini: '',
            fecha_fin: '',
            prob: '',
            sol: '',
            obs:''
        };

        //Validaciones
        $("#incidencias-form").validate({
            rules:{
                reporta: {
                    required: true
                },
                responsable:{
                    required: true
                },
                fechaReporte: {
                    required: true,
                    date: true
                },
                fechaSolucion: {
                    required:true,
                    date: true
                },
                problema: {
                    required:true
                },
                solucion:{
                    required: true
                }
            },
            messages:{
                reporta: {
                    required: "Ingrese la persona que reporta!"
                },
                responsable: {
                    required: "Ingrese un responsable!"
                },
                fechaReporte :{
                    required: "Seleccione una fecha!",
                    date: "Fecha inválida"
                },
                fechaSolucion: {
                    required: "Seleccione una fecha!",
                    date: "Fecha inválida"
                },
                problema: {
                    required: "Ingrese el problema!",
                },
                solucion:{
                    required: "Ingrese la solución implementada!"
                }
            }
        });



    /*
        $('#btnGuardarTransmision').click(function(){

            transmision.ubi = $('#txtUbicacion').val();
            transmision.tec = $('#txtResponsable').val();
            transmision.correo = $('#txtEmail').val();
            transmision.uni_movil = $('#txtMovil').val();
            transmision.fecha_ini = $('#dpInicio').val();
            transmision.fecha_fin = $('#dpFin').val();
            transmision.prob = $('#txtProblema').val();
            transmision.sol = $('#txtSolucion').val();
            transmision.obs = $('#txtObservacion').val();

            $.ajax({
                type: 'POST',
                dataType:'text',
                url: 'Controller/TransmisionController.php',
                data: { register: JSON.stringify( transmision ) },
                success: function(response) {
                    alert('Registro exitoso')
                    $("#content").html(response);
                }
            })
        })
*/
        var msg = {
            tipo: '',
            action: '',
            param: '',
            filter: ''
        }

        $('#btnRegresar').click(function(){
            msg.action =  'Lista';
            msg.tipo = 'Incidencias';
            $.ajax({
                type: 'POST',
                dataType:'text',
                url: 'Controller/IncidenciasController.php',
                data: msg,
                success: function(response) {
                    $("#content").html(response);
                }
            })
        })
    })
</script>