<?php 
    if($_GET['form']=='add'){?>
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>Agregar Proveedor
            </h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
                <li><a href="?module=proveedor"> Proveedores</a></li>
                <li class="active"> Más</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/proveedor/proses.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php 
                                    $query_id = mysqli_query($mysqli, "SELECT MAX(prv_cod) AS id FROM proveedor")
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
                                    <label class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo ?>" readonly>
                                    </div>
                                </div>
       


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Razon Social</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="razon" autocomplete="off" placeholder="Ingresa una la Razon Social" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">RUC</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ruc" autocomplete="off" placeholder="Ingrese su RUC" 
                                        onkeyPress="return goodchars(event, '0123456789', this)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Direccion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="direccion" autocomplete="off" placeholder="Ingrese su Direccion" 
                                         required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="telefono" autocomplete="off" placeholder="Ingrese su Telefono" 
                                        onkeyPress="return goodchars(event, '0123456789', this)" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Correo Electronico</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="correo" autocomplete="off" placeholder="Ingrese su Correo " 
                                         required>
                                    </div>
                                </div>

                            

                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=proveedor" class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
    

        </section>
    <?php }
    elseif($_GET['form']=='edit'){
        if(isset($_GET['id'])){
            $query = mysqli_query($mysqli, "SELECT * FROM proveedor WHERE prv_cod= '$_GET[id]'")
            or die('error'.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
        } ?>
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>Modificar Proveedor
            </h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
                <li><a href="?module=proveedor"> Proveedor</a></li>
                <li class="active"> Modificar</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/productos/proses.php?act=update" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $data['cod_producto'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción de Productos</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="descrip_producto" autocomplete="off" value="<?php echo $data['descrip_producto'] ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Orden de Produccion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="part_number" autocomplete="off" value="<?php echo $data['part_number'] ?>" 
                                        onkeyPress="return goodchars(event, '0123456789', this)" required>
                                    </div>
                                </div>


                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=productos" class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php }
?>s