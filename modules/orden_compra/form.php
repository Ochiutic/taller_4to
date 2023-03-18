<?php 
    if($_GET['form']=='add'){ ?>
      <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Agregar Orden de Compra.</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=orden_compra"> Orden de Compra.</a></li>
        <li class="active">Agregar</li>
      </ol>
      </section>      

      <section class="content">
            <!------------------------------------------->
            <div class="box box-primary">
                    <div class="box-body">
                        <!------------------------------------------->
                        <form role="form" class="form-horizontal" method="POST">
                            <div class="form-group">
                            <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-social btn-submit" style="width:250px">
                                        <i class="fa fa-file-text-o icon-title"></i>
                                        Presupuestos de Proveedores
                                        <?php 

                                            $query_val = mysqli_query($mysqli, "SELECT * FROM presu_provee
                                                                                ORDER BY presu_cod ASC") or die ('Error'.mysqli_error($mysqli));

                                        ?>
                                    </button>
                                </div>
                            </div>
                            <!------------------------------------------->
                            <div class="form-group">
                                <!------------------------------------------->
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="codigo_materia" data-placeholder= "-- Seleccionar el Presupuesto --"
                                    autocomplete="off">
                                        <option value=""></option>
                                        <?php 
                                            $query_dep = mysqli_query($mysqli, "SELECT presu_cod, presu_decri
                                                                                FROM presu_provee
                                                                                ORDER BY presu_cod ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_mat = mysqli_fetch_assoc($query_dep)){

                                                echo "<option value=\"$data_mat[presu_cod]\">$data_mat[presu_cod] | $data_mat[presu_decri]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!------------------------------------------->
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-social btn-submit" style="width:300px">
                                        <i class="fa fa-file-text-o icon-title"></i>
                                        Buscar Presupuestos de Proveedores
                                    </button>
                                </div>
                                <?php 
                                    if(!empty($_POST['codigo_materia'])){
                                        $codigo_materia = $_POST['codigo_materia'];
                                        $query_val = mysqli_query($mysqli, "SELECT * FROM presu_provee WHERE presu_cod = $codigo_materia
                                                                            ORDER BY presu_cod ASC") or die ('Error'.mysqli_error($mysqli));
            
                                    }
                                ?>
                    
                            </div>

                        </form>
                        <!------------------------------------------->
                    <section class="content-header">
                        
                    

                        <table id="dataTables1" class="table table-bordered table-striped table-hover">

                        <!------------------------------------------->
                        <h2>Presupuestos de Proveedores</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                            <th class="center">N° de Pedido</th>
                                <th class="center">Descrip. Presupuesto</th>
                                <th class="center">Fecha</th>
                                <th class="center">Estado</th>
                                <th class="center">Usuario</th>
                                <th class="center">Sucursal</th>
                                <th class="center">Pedido de Compra</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                if(isset($codigo_materia)){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_presu WHERE presu_cod = $codigo_materia
                                    ORDER BY presu_cod ASC")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_presu ;")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $cod = $data['presu_cod'];
                                    $presu_decri = $data['presu_decri'];
                                    $presu_fecha = $data['presu_fecha'];
                                    $estado = $data['estado'];
                                    $name_user = $data['name_user'];
                                    $sucursal = $data['cod_sucursal'];
                                    $ped_cod = $data['descrip_com'];
     
     
     
                                    echo "<tr>
                                    <td class='center'>$cod</td>
                                    <td class='center'>$presu_decri</td>
                                    <td class='center'>$presu_fecha</td>
                                    <td class='center'>$estado</td>                      
                                    <td class='center'>$name_user</td>
                                    <td class='center'>$sucursal</td>
                                    <td class='center'>$ped_cod</td>
                                            </tr>
                                                
                                            ";
                                
                                }
                            ?>
                        </tbody>
                        <!------------------------------------------->
                        </table>
                  </section>

                  <section class="content-header">
                        <table id="dataTables1" class="table table-bordered table-striped table-hover">

                        <!------------------------------------------->
                        <h2>Detalle de Presupuesto Compras</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Descripcion de Materia</th>
                                <th class="center">Tipo de Materia</th>
                                <th class="center">Proveedor</th>
                                <th class="center">Cantidad</th>
                                <th class="center">Precio</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                if(isset($codigo_materia)){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_presu WHERE presu_cod = $codigo_materia
                                    ORDER BY presu_cod ASC")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_presu ;")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }

                                while($data2 = mysqli_fetch_assoc($query)){
                                    $codigo1= $data2['presu_cod'];
                                    $descrip_materia= $data2['descri_materia'];
                                    $tipo= $data2['tipo_materia'];
                                    $prov= $data2['prv_razsoc'];
                                    $cantidad = $data2['cantidad'];
                                    $precio = $data2['precio'];
     
     
     
                                    echo "<tr>
                                    <td class='center'>$codigo1</td>
                                    <td class='center'>$descrip_materia</td>
                                    <td class='center'>$tipo</td>
                                    <td class='center'>$prov</td>
                                    <td class='center'>$cantidad</td>
                                    <td class='center'>$precio</td>
                                            </tr>
                                                
                                            ";
                                
                                }
                            ?>
                            </tbody>
                        </table>
                    </section>
                  </div>
              </div>
         </div>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/orden_compra/proses.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php 
                                    $query_id = mysqli_query($mysqli, "SELECT MAX(ord_cod) AS id FROM orden_compra")
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
                                    <label class="col-sm-3 control-label">N° de Pedido</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha" autocomplete="off" 
                                        value="<?php echo date("yy-m-d"); ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Usuario</label>
                                       <div class="col-sm-2">
                                            <input type="text" class="form-control" name="usuario" autocomplete="off" value="<?php echo $_SESSION['name_user']; ?>" readonly>
                                        </div>
                              </div> 
                              <div class="form-group">
                                 <label class="col-sm-3 control-label">Presupuestos de Proveedores</label>
                                    <div class="col-sm-3">
                                        <select class="chosen-select" name="presu_prove" data-placeholder=" -- Seleccione el Presupuesto --" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT presu_cod, presu_decri
                                                FROM presu_provee
                                                ORDER BY presu_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_ord = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_ord[presu_cod]\">$data_ord[presu_cod] | $data_ord[presu_decri]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                        <label class="col-sm-2 control-label">Cliente</label>
                                     <div class="col-sm-3">
                                        <select class="chosen-select" name="cliente" data-placeholder=" -- Seleccione el Cliente --" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_raz = mysqli_query($mysqli,"SELECT cod_razon, descrip_razon
                                                FROM razon_social
                                                ORDER BY cod_razon ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_ord = mysqli_fetch_assoc($query_raz)){
                                                    echo "<option value=\"$data_ord[cod_razon]\">$data_ord[cod_razon] | $data_ord[descrip_razon]</option>";
                                                }
                                            ?>
                                        </select> 
                                    </div>
                                </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label">Orden de Compra</label>
                                       <div class="col-sm-3">
                                            <input type="text" class="form-control" name="orden" autocomplete="off" placeholder="Ingresa una Descripción" required>
                                        </div>

                                        <label class="col-sm-2 control-label">Presupuesto Compra</label>
                                        <div class="col-sm-3">
                                        <select class="chosen-select" name="presu" data-placeholder=" -- Seleccione el Presupuesto--" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_orden = mysqli_query($mysqli,"SELECT presu_cod, precio
                                                FROM det_presu_prov
                                                ORDER BY presu_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_ord = mysqli_fetch_assoc($query_orden)){
                                                    echo "<option value=\"$data_ord[presu_cod]\">$data_ord[presu_cod] | $data_ord[precio]</option>";
                                                }
                                            ?>
                                        </select> 
                                    </div>
                                </div>  
                                <div class="form-group">
                                <label class="col-sm-5 control-label">Proveedores</label>
                                     <div class="col-sm-3">
                                        <select class="chosen-select" name="proveedor" data-placeholder="Seleccionela El Proveedor" autocomplete="off" required>    
                                            <option value=""></option>
                                            <?php 
                                                $query_prv = mysqli_query($mysqli,"SELECT prv_cod, prv_razsoc
                                                FROM proveedor
                                                ORDER BY prv_cod ASC") or die('error'.mysqli_error($mysqli));
                                                while($data_prov = mysqli_fetch_assoc($query_prv)){
                                                    echo "<option value=\"$data_prov[prv_cod]\">$data_prov[prv_cod] | $data_prov[prv_razsoc] </option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                            


                                <form role="form" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=orden_compra" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                        <a class="btn btn-primary btn-social pull-right" href="?module=form_orden_compra&form=add" title="Agregar" data-toggle="tooltip">
                                        <i class="fa fa-plus"></i>Agregar Presupuestos.
                                        </a>
                                    </div>        
                                </form>
                            </form>
                            </section>
                        </div>
                  </div>
             </div>
         </div>
         
</section>  

    <?php } 
    ?>

    

    