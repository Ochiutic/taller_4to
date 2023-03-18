<?php 
    if($_GET['form']=='add'){ ?>
      <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Agregar Presupuesto de Proveedores.</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=presu_provee"> Presupuesto de Proveedores.</a></li>
        <li class="active">Agregar</li>
      </ol>
      </section>      

      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/presu_provee/proses.php?act=insert" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT MAX(presu_cod) as id FROM presu_provee")
                                                        or die('Error'.mysqli_error($mysqli));

                                $count = mysqli_num_rows($query_id);  
                                if($count <> 0){
                                    $data_id = mysqli_fetch_assoc($query_id);
                                    $codigo = $data_id['id']+1;
                                } else{
                                    $codigo=1;
                                }                      
                            ?>
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Código</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                </div>

                                <label class="col-sm-1 control-label">Fecha</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha" autocomplete="of" 
                                    value="<?php echo date("yy-m-d"); ?>" readonly>
                                </div>

                                <div class="form-group">
                                        <label class="col-sm-1 control-label">Usuario</label>
                                       <div class="col-sm-2">
                                            <input type="text" class="form-control" name="usuario" autocomplete="off" value="<?php echo $_SESSION['name_user']; ?>" readonly>
                                        </div>

                                        <label class="col-sm-1 control-label">Sucursal</label>
                                       <div class="col-sm-2">
                                            <input type="text" class="form-control" name="sucursal" autocomplete="off" value="<?php echo $_SESSION['descri_sucursal']; ?>" readonly>
                                        </div>
                                    </div>
                                    
                                <hr>

                                
                                <div class="form-group">    
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
                              <div clas ="form-group">
                                    
                                    <label class="col-sm-2 control-label">Cantidad</label>
                                   <div class="col-sm-3">
                                        <input type="text" class="form-control" name="cantidad" autocomplete="off" placeholder="Ingrese la Cantidad" required>
                                    </div>
                                </div>

                              <label class="col-sm-2 control-label">Pedidos de Compra</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="pedido_compra" data-placeholder="Seleccione el Pedido" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT ped_cod, descrip_com
                                                FROM pedido_compra
                                                ORDER BY ped_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_raz = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_raz[ped_cod]\">$data_raz[ped_cod] | $data_raz[descrip_com]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                            </div>
                            <div class ="form-group">                
                                    <label class="col-sm-2 control-label">Precio</label>
                                   <div class="col-sm-3">
                                        <input type="text" class="form-control" name="precio" autocomplete="off" placeholder="Ingrese el Precio" required>
                                    </div>

                                    <div class ="form-group">
                                    
                                    <label class="col-sm-2 control-label">Descripcion del Presupuesto</label>
                                   <div class="col-sm-3">
                                        <input type="text" class="form-control" name="descrip" autocomplete="off" placeholder="Ingrese una Descripcion" required>
                                    </div>
                                </div>
                            </div>

                                
                                            
                                    
                                <hr>
                           

                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=presu_provee" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                    <a class="btn btn-primary btn-social pull-right" href="?module=form_compras&form=add" title="Agregar" data-toggle="tooltip">
                                    <i class="fa fa-plus"></i>Agregar Pedidos de Compra
                                    </a>
                                </div>
                               
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
      
      </section>  

    <?php } ?>

    

    