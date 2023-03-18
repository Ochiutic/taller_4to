<?php
if ($_GET['form'] == 'add') { ?>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title"></i>Agregar Orden
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="?module=orden_produccion"> Orden de Produccion</a></li>
            <li class="active"> Más</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/orden_produccion/proses.php?act=insert"
                        method="POST">
                        <div class="box-body">
                            <?php
                            $query_id = mysqli_query($mysqli, "SELECT MAX(cod_orden) AS id FROM orden_produccion")
                                or die('error' . mysqli_error($mysqli));
                            $count = mysqli_num_rows($query_id);
                            if ($count <> 0) {
                                $data_id = mysqli_fetch_assoc($query_id);
                                $codigo = $data_id['id'] + 1;
                            } else {
                                $codigo = 1;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Código de Orden</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>"
                                        readonly>
                                </div>

                                <label class="col-sm-1 control-label">Fecha</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy"
                                        name="fecha" autocomplete="off" value="<?php echo date("yy-m-d"); ?>" readonly>
                                </div>

                                <label class="col-sm-1 control-label">Hora</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="H-mm-ss"
                                        name="hora" autocomplete="off" value="<?php echo date("H:i:s"); ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Presupuestos Aprobados</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="presup"
                                        data-placeholder="Seleccione el Presupuesto Aprob." autocomplete="off" required>
                                        <option value=""></option>
                                        <?php
                                        $query_raz = mysqli_query($mysqli, "SELECT cod_presu, descri_presu
                                                FROM presupuesto
                                                ORDER BY cod_presu ASC") or die('error' . mysqli_error($mysqli));
                                        while ($data_raz = mysqli_fetch_assoc($query_raz)) {
                                            echo "<option value=\"$data_raz[cod_presu]\">$data_raz[cod_presu] | $data_raz[descri_presu]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción de la Orden</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="descri_orden" autocomplete="off"
                                            placeholder="Ingresa una Descripción" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Operarios de Planta</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="operarios"
                                        data-placeholder="Seleccione los Operarios" autocomplete="off" required>
                                        <option value=""></option>
                                        <?php
                                        $query_ope = mysqli_query($mysqli, "SELECT id_operario, nombre, apellido
                                                FROM operarios
                                                ORDER BY id_operario ASC") or die('error' . mysqli_error($mysqli));
                                        while ($data_ope = mysqli_fetch_assoc($query_ope)) {
                                            echo "<option value=\"$data_ope[id_operario]\">$data_ope[nombre]</option> | $data_ope[apellido]</option>  ";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <label class="col-sm-2 control-label">Sectores de Trabajo</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="sectores" data-placeholder="Seleccione los Sectores"
                                        autocomplete="off" required>
                                        <option value=""></option>
                                        <?php
                                        $query_sec = mysqli_query($mysqli, "SELECT cod_sector, descrip_sector
                                                FROM sector
                                                ORDER BY cod_sector ASC") or die('error' . mysqli_error($mysqli));
                                        while ($data_sec = mysqli_fetch_assoc($query_sec)) {
                                            echo "<option value=\"$data_sec[cod_sector]\">$data_sec[cod_sector] | $data_sec[descrip_sector]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha Inicio</label>
                                <div class="col-sm-2">
                                    <input type="date"  value="2023-03-01"
                                        name="inicio">
                                </div>

                                <label class="col-sm-2 control-label">Fecha Fin</label>
                                <div class="col-sm-2">
                                    <input type="date"  value="2023-03-01"
                                        name="fin">
                                </div>
                          </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 control-label">Orden de Produccion</label>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#myModal">
                                            <span class="glyphicon glyphicon-plus">Agregar Orden de Produccion</span>
                                        </button>
                                    </div>
                                </div>

                                <div id="resultados" class="col-md-9"></div>

                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar"
                                                value="Guardar">
                                            <a href="?module=orden_produccion"
                                                class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        load(1);
    });
    function load(page) {
        var x = $("#x").val();
        var parametros = { "action": "ajax", "page": page, "x": x };
        $("#loader").fadeIn('slow');
        $.ajax({
            url: './ajax1.1/productos_pedidos.php',
            data: parametros,
            beforeSend: function (objeto) {
                $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
            },
            success: function (data) {
                $(".outer_div").html(data).fadeIn('slow');
                $('#loader').html('');
            }
        })
    }
</script>
<script>
    function agregar(id) {
        var cantidad = $('#cantidad_' + id).val();
        if (isNaN(cantidad)) {
            alert('Esto no es un Número');
            document.getElementById('cantidad_' + id).focus();
            return false;
        }
        //Fin de la Validación
        var parametros = { "id": id, "cantidad": cantidad };
        $.ajax({
            type: "POST",
            url: "./ajax1.1/agregar_pedido.php",
            data: parametros,
            beforeSend: function (objeto) {
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function (datos) {
                $("#resultados").html(datos);
            }
        });
    }
    function eliminar(id) {
        $.ajax({
            type: "GET",
            url: "./ajax1.1/agregar_pedido.php",
            data: "id=" + id,
            beforeSend: function (objeto) {
                $("#resultados").html("Mensaje: Cargando...");
            },
            success: function (datos) {
                $("#resultados").html(datos);
            }
        });
    }
</script>

<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span
                        ara-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buscar Ordenes</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="x" placeholder="Buscar Ordenes"
                                onkeyup="load(1)">
                        </div>
                        <button type="button" class="btn btn-default" onclick="load(1)"><span
                                class="glyphicon glyphicon-search"></span> Buscar</button>
                    </div>
                </form>
                <div id="loader" style="position: absolute; text-align: center; top: 55px; width: 100%; display: none;">
                </div>
                <div class="outer_div"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>