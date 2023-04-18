<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=presu_provee">Presuuestos</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Presupuestos de Proveedores.
    <a class="btn btn-primary btn-social pull-right" href="?module=form_presu_provee&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar Presupuestos de Proveedores.
    </a>
</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php 
            if(empty($_GET['alert'])){
                echo "";
            }
            elseif($_GET['alert']==1){
                echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exitoso!</h4>
                Datos registrados correctamente
                </div>";
            }
          
            elseif($_GET['alert']==2){
                echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Existoso</h4>
                Datos anulados correctamente
                </div>";
            }
            ?>

            <div class="box box-primary">
                <div class="box-body">
                <section class="content-header">
                    
                </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Presupuestos de Proveedores.</h2>
                        <thead>
                            <tr>
                                <th class="center">N° de Pedido</th>
                                <th class="center">Descrip. Presupuesto</th>
                                <th class="center">Fecha</th>
                                <th class="center">Estado</th>
                                <th class="center">Usuario</th>
                                <th class="center">Sucursal</th>
                                <th class="center">Pedido de Compra</th>
                                <th class="center">Accion</th>
                                
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM v_presu")
                            or die('Error'.mysqli_error($mysqli));

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
                               <td class='center' width='150'>
                               <div>";?>

                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de Pedidos" class="btn btn-warning btn-sm"
                              href="modules/presu_provee /print.php?act=imprimir&presu_cod=<?php echo $data['presu_cod']; ?>" target="_blank">
                                <i style="color:#000" class="fa fa-print"></i>
                              </a>

                              <a data-toggle="tooltip" data-placement="top" title="Anular Pedido de Compra" class="btn btn-danger btn-sm"
                             href="modules/presu_provee/proses.php?act=anular&presu_cod=<?php echo $data['presu_cod']; ?>"
                             onclick = "return confirm('Estas seguro/a de anular ?');">
                                <i style="color_#000" class="glyphicon glyphicon-trash "></i>
                             </a>
                                <?php echo "</div>
                                </td>
                                </tr>" ?>
                            <?php }                               
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>