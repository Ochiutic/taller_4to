<section class= "content-header">
    <ol class= "breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home">INICIO</i></a></li>
        <li class="active"><a href="?module=registrar_compras">Registrar y generar IVA de Compras</a></li>
    </ol><br><hr>
<h1>
    <i class="fa fa-holder icon-title"></i> Datos de IVA y Compras
    <a class="btn btn-primary btn-social pull-right" href="?module=form_registrar_compras&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i> Agregar Registros de Compras
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
                    <h4> <i class='icon fa fa-check-circle'></i>Exitoso </h4>
                    Datos registrados correctamente.
                    </div>";
                }
                elseif($_GET['alert']==2){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Exitoso </h4>
                    Datos anulados correctamente.
                    </div>";
                }
                elseif($_GET['alert']==3){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Error </h4>
                    No se pudo realizar la acción.
                    </div>";
                }
                elseif($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Error </h4>
                    ORDEN DE PRODUCCION RECHZADA!
                    </div>";
                }
                elseif($_GET['alert']==5){
                    echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Exitoso </h4>
                    ORDEN DE PRODUCCION APROBADA!
                    </div>";
                }
            ?>
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                        <table id="dataTables1" class="table table-bordered table-striped table-hover">
                            <h2>Lista de Registos de Compras</h2>
                            <thead>
                                <tr>
                                    <th class="center">Codigo</th>
                                    <th class="center">Pedido de Compra</th>
                                    <th class="center">Fecha de Pedido</th>
                                    <th class="center">Usuario</th>
                                    <th class="center">Orden de Compra</th>
                                    <th class="center">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM v_registro")
                            or die('Error'.mysqli_error($mysqli));

                            while($data = mysqli_fetch_assoc($query)){
                               $cod = $data['ped_cod'];
                               $ped_descri = $data['ped_descri'];
                               $ped_fecha = $data['ped_fecha'];
                               $id_user = $data['id_user'];
                               $ord_cod= $data['ord_descrip'];
                               $estado = $data['estado'];



                               echo "<tr>
                               <td class='center'>$cod</td>
                               <td class='center'>$ped_descri</td>
                               <td class='center'>$ped_fecha</td>
                               <td class='center'>$id_user</td>
                               <td class='center'>$ord_cod</td>
                               <td class='center'>$estado</td>
                               <td class='center' width='150'>
                               <div>";?>
                            <a data-toggle="tooltip" data-placement="top" title="Anular Registro de IVA y compras" class="btn btn-danger btn-sm"
                             href="modules/registrar_compras/proses.php?act=anular&ped_cod=<?php echo $data['ped_cod']; ?>"
                             onclick = "return confirm('Estas seguro/a de anular <?php echo $data['ped_descri']; ?>  <?php echo $data['ped_fecha']; ?> <?php echo $data['name_user']; ?> <?php echo $data['name_user']; ?> <?php echo $data['ord_descrip']; ?> <?php echo $data['estado']; ?>?');">
                                <i style="color_#000" class="glyphicon glyphicon-trash "></i>
                             </a>

                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de Pedidos" class="btn btn-warning btn-sm"
                              href="modules/registrar_compras/print.php?act=imprimir&ped_cod=<?php echo $data['ped_cod']; ?>" target="_blank">
                                <i style="color:#000" class="fa fa-print"></i>
                              </a>
                                <?php echo "</div>
                                </td>
                                </tr>" ?>
                            <?php }                               
                            ?>
                        </tbody>
                        </table>
                    </section>

                </div>
            </div>
        </div>
    </div>

</section>