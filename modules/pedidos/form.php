<?php 
    if($_GET['form']=='add'){ ?>
      <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Agregar Pedidos de Clientes</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=pedidos"> Pedidos de Clientes</a></li>
        <li class="active">Agregar</li>
      </ol>
      </section>      

      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/pedidos/proses.php?act=insert" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT MAX(cod_pedi) as id FROM pedidos")
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

                                <label class="col-sm-1 control-label">Hora</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="H-mm-ss" name="hora" autocomplete="of" 
                                    value="<?php echo date("H:i:s"); ?>" readonly>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-1 control-label">Usuario</label>
                                       <div class="col-sm-2">
                                            <input type="text" class="form-control" name="usuario" autocomplete="off" value="<?php echo $_SESSION['name_user']; ?>" readonly>
                                        </div>
                                    </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Clientes</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="cod_razon" data-placeholder="Seleccione un Cliente" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT cod_razon, descrip_razon, nom_cli
                                                FROM razon_social
                                                ORDER BY cod_razon ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_raz = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_raz[cod_razon]\">$data_raz[descrip_razon] | $data_raz[nom_cli]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Descripción del Pedido</label>
                                       <div class="col-sm-3">
                                            <input type="text" class="form-control" name="descri_pedi" autocomplete="off" placeholder="Ingresa una Descripción" required>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Productos</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="producto" data-placeholder="Seleccione el Producto" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT cod_producto, descrip_producto, part_number
                                                FROM productos
                                                ORDER BY cod_producto ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_raz = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_raz[cod_producto]\">$data_raz[cod_producto] | $data_raz[descrip_producto] | $data_raz[part_number]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                        <div class="form-group">
                                        <label class="col-sm-2 control-label">Cantidad</label>
                                       <div class="col-sm-3">
                                            <input type="text" class="form-control" name="cantidad" autocomplete="off" placeholder="Ingresa una Descripciónla cantidad de Productos">
                                    
                                    </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group has-feedback">

                            </div>

                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=abastecimiento" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                    <a class="btn btn-primary btn-social pull-right" href="?module=form_razon_social&form=add" title="Agregar" data-toggle="tooltip">
                                    <i class="fa fa-plus"></i>Agregar Cliente
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

    

    