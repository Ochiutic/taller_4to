<?php 
    if($_GET['form']=='add'){?>
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>Agregar Costos de Produccion
            </h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
                <li><a href="?module=costos"> Costos de Produccion</a></li>
                <li class="active"> Más</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/costos/proses.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php 
                                    $query_id = mysqli_query($mysqli, "SELECT MAX(cod_costos) AS id FROM costos")
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
                                    <label class="col-sm-2 control-label">Código de Costos</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha" autocomplete="off" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Hora</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="H-mm-ss" name="hora" autocomplete="off" 
                                        value="<?php echo date("H:i:s"); ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                 <div class="form-group">
                                         <label class="col-sm-2 control-label">Descripcion de los Costos</label>
                                        <div class="col-sm-2">
                                          <input type="text" class="form-control" name="descri_costos" onKeyPress="return goodchars(event,'0123456789',this)"  required>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Orden de Produccion</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="cod_orden" data-placeholder="Seleccione el Pedido" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_ord = mysqli_query($mysqli,"SELECT cod_orden, descri_orden
                                                FROM orden_produccion
                                                ORDER BY cod_orden ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_ord = mysqli_fetch_assoc($query_ord)){
                                                    echo "<option value=\"$data_ord[cod_orden]\">$data_ord[cod_orden] | $data_ord[descri_orden]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
   
                                </div>
                              
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Pedido Material</label>
                                    <div class="col-sm-4">
                                        <select class="chosen-select" name="cod_pmat" data-placeholder="Seleccione el Pedido" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_pmat = mysqli_query($mysqli,"SELECT cod_pmat, descri_pmat
                                                FROM pedido_material
                                                ORDER BY cod_pmat ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_pmat = mysqli_fetch_assoc($query_pmat)){
                                                    echo "<option value=\"$data_pmat[cod_pmat]\">$data_pmat[cod_pmat] | $data_pmat[descri_pmat]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Manufactura</label>
                                    <div class="col-sm-4">
                                        <select class="chosen-select" name="cod_manu" data-placeholder="-- Seleccione la Manufactura --" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_manu = mysqli_query($mysqli,"SELECT cod_manu, descri_manu
                                                FROM manufactura
                                                ORDER BY cod_manu ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_manu = mysqli_fetch_assoc($query_manu)){
                                                    echo "<option value=\"$data_manu[cod_manu]\">$data_manu[cod_manu] | $data_manu[descri_manu]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="col-sm-2 control-label"> Tipo de Manufactura</label>
                                    <div class="col-sm-4">
                                        <select class="chosen-select" name="cod_tipo_manu" data-placeholder="-- Seleccione el Tipo de Manufactura --" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_manu = mysqli_query($mysqli,"SELECT cod_manu, tipo_manu
                                                FROM manufactura
                                                ORDER BY cod_manu ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_manu = mysqli_fetch_assoc($query_manu)){
                                                    echo "<option value=\"$data_manu[cod_manu]\">$data_manu[cod_manu] | $data_manu[tipo_manu]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                 </div>
                            <div class="form-group">
                                 <div class="form-group">
                                         <label class="col-sm-2 control-label">Cantidad</label>
                                        <div class="col-sm-2">
                                          <input type="text" class="form-control" name="cantidad" onKeyPress="return goodchars(event,'0123456789',this)"  required>
                                        </div>
                                   
                                    
                                        <label class="col-sm-2 control-label">Precio</label>
                                         <div class="col-sm-2">
                                            <input type="text" class="form-control" name="precio" onKeyPress="return goodchars(event,'0123456789',this)"required>   
                                        </div>
                                   
                            </div>  
               

                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=costos" class="btn btn-default btn-reset">Cancelar</a>
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
    
    

