<?php 
    if($_GET['form']=='add'){?>
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>Agregar Pedidos
            </h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
                <li><a href="?module=compras"> Pedidos de Compra</a></li>
                <li class="active"> Más</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/compras/proses.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php 
                                    $query_id = mysqli_query($mysqli, "SELECT MAX(ped_cod) AS id FROM pedido_compra")
                                    or die('error'.mysqli_error($mysqli));
                                    $count = mysqli_num_rows($query_id);
                                    if($count <> 0){
                                        $data_id = mysqli_fetch_assoc($query_id);
                                        $codigo = $data_id['id']+1;
                                    }else{
                                        $codigo=1;
                                    }
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Código de Pedido</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Sucursal</label>
                                       <div class="col-sm-2">
                                            <input type="text" class="form-control" name="sucursal" autocomplete="off" value="<?php echo $_SESSION['descri_sucursal']; ?>" readonly>
                                        </div>
                                

                                    <div class="form-group">
                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha" autocomplete="of" 
                                        value="<?php echo date("yy-m-d"); ?>" readonly>
                                     </div>
                                  </div>
                                </div>

                                
                                <div class="form-group">
                                        <label class="col-sm-2 control-label">Descripción del Pedido Compra</label>
                                       <div class="col-sm-3">
                                            <input type="text" class="form-control" name="descrip_com" autocomplete="off" placeholder="Ingresa una Descripción" required>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Materia Prima</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="materia" data-placeholder="Seleccionela Materia Prima" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT cod_materia, descri_materia, tipo_materia
                                                FROM materia_prima
                                                ORDER BY cod_materia ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_raz = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_raz[cod_materia]\">$data_raz[cod_materia] | $data_raz[descri_materia] | $data_raz[tipo_materia]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <label class="col-sm-2 control-label">Proveedores</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="proveedor" data-placeholder="Seleccionela El Proveedor" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT prv_cod, prv_razsoc
                                                FROM proveedor
                                                ORDER BY prv_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_raz = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_raz[prv_cod]\">$data_raz[prv_cod] | $data_raz[prv_razsoc] </option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label"> Cantidad</label>
                                    <div class="col-sm-3">
                                            <input type="number" class="form-control" name="cantidad" autocomplete="off" placeholder="Ingresa una la cantidad" required>
                                    </div>
                                            </div>
                     </div>  

                                
                              

                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=compras" class="btn btn-default btn-reset">Cancelar</a>
                                            
                                            <div class= "form-group">
                                                <a class="btn btn-primary btn-social pull-right" href="?module=form_proveedor&form=add" title="Agregar" data-toggle="tooltip">
                                                     <i class="fa fa-plus"></i> Agregar Proveedor.
                                                 </a>
                                            </div>
                                                 <div class= "form-group">
                                                     <a class="btn btn-primary btn-social pull-right" href="?module=form_materia_prima&form=add" title="Agregar" data-toggle="tooltip">
                                                         <i class="fa fa-plus"></i> Agregar Materia Prima.
                                                     </a>
                                            </div>
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){
            load(1);
        });
        function load(page){
            var x = $("#x").val();
            var parametros={"action":"ajax","page":page, "x":x};
            $("#loader").fadeIn('slow');
            $.ajax({
                url:'./ajax1.1/productos_pedidos.php',
                data: parametros,
                beforeSend: function(objeto){
                    $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
                },
                success:function(data){
                    $(".outer_div").html(data).fadeIn('slow');
                    $('#loader').html('');
                }
            })  
        }
    </script>
    <script>
        function agregar(id){
            var cantidad = $('#cantidad_'+id).val();
            if(isNaN(cantidad)){
                alert('Esto no es un Número');
                document.getElementById('cantidad_'+id).focus();
                return false;
            }
            //Fin de la Validación
            var parametros={"id":id,"cantidad":cantidad};
            $.ajax({
                type: "POST",
                url: "./ajax1.1/agregar_pedido.php",
                data: parametros,
                beforeSend: function(objeto){
                    $("#resultados").html("Mensaje: Cargando...");
                },
                success: function(datos){
                    $("#resultados").html(datos);
                }
            });
        }
        function eliminar(id){
            $.ajax({
                type: "GET",
                url: "./ajax1.1/agregar_pedido.php",
                data: "id="+id,
                beforeSend: function(objeto){
                    $("#resultados").html("Mensaje: Cargando...");
                },
                success: function(datos){
                    $("#resultados").html(datos);
                }
            });
        }
    </script>

    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="close"><span ara-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buscar Ordenes</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="x" placeholder="Buscar Ordenes" onkeyup="load(1)">
                            </div>
                            <button type="button" class="btn btn-default" onclick="load(1)"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                        </div>
                    </form>
                    <div id="loader" style="position: absolute; text-align: center; top: 55px; width: 100%; display: none;"></div>
                    <div class="outer_div"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

