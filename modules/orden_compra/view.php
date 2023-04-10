<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=orden_compra">Orden de Compra</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Orden de Compra.
    <a class="btn btn-primary btn-social pull-right" href="?module=form_orden_compra&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar Orden de Compra.
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
                        <h2>Lista de Ordenes de Compras.</h2>
                        <thead>
                            <tr>
                                <th class="center">N° de Pedido</th>
                                <th class="center">Orden de Compra</th>
                                <th class="center">Fecha de la Orden</th>
                                <th class="center">Presupuestos Aprobados</th>
                                <th class="center">Usuario</th>
                                <th class="center">Estado</th>
                                
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM v_compra2")
                            or die('Error'.mysqli_error($mysqli));

                            while($data = mysqli_fetch_assoc($query)){
                               $cod = $data['ord_cod'];
                               $descri_comp = $data['ord_descrip'];
                               $fecha = $data['ord_fecha'];
                               $presu = $data['presu_decri'];
                               $name_user = $data['name_user'];
                               $estado = $data['estado'];
                               



                               echo "<tr>
                               <td class='center'>$cod</td>
                               <td class='center'>$descri_comp</td>
                               <td class='center'>$fecha</td>
                               <td class='center'>$presu</td>                      
                               <td class='center'>$name_user</td>
                               <td class='center'>$estado</td>
                               <td class='center' width='150'>
                               <div>";?>

                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de Pedidos" class="btn btn-warning btn-sm"
                              href="modules/orden_compra/print.php?act=imprimir&ord_cod=<?php echo $data['ord_cod']; ?>" target="_blank">
                                <i style="color:#000" class="fa fa-print"></i>
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