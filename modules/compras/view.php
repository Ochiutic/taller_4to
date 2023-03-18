<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class=" fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="?module=compras">Pedido de Compras</a></li>
    </ol><br><hr>
    <h1>
        <i class="fa fa-folder icon-title"></i>Datos de Pedido de Compras.
        <a class="btn btn-primary btn-social pull-right" href="?module=form_compras&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i> Agregar Pedido de Compras.
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
                       
                    </section>
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Pedidos de Compra</h2>
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Descripcion de Pedido Compra</th>
                                <th class="center">Fecha</th>
                                <th class="center">Sucursal</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nro=1;
                                $query=mysqli_query($mysqli, "SELECT * FROM v_compra")
                                or die('error 62: '.mysqli_error($mysqli));

                                while($data = mysqli_fetch_assoc($query)){
                                    $cod= $data['ped_cod'];
                                    $descrip_com = $data['descrip_com'];
                                    $fecha = $data['fecha'];
                                    $sucursal = $data['descri_sucursal'];
                                    $estado = $data['estado'];

                                    echo "<tr>
                                    <td class='center'>$cod</td>
                                    <td class='center'>$descrip_com</td>
                                    <td class='center'>$fecha</td>
                                    <td class='center'>$sucursal</td>
                                    <td class='center'>$estado</td>
                                    <td class='center' width='100'>
                                    <div>"; ?>
         
                                    <a data-toggle="tooltip" data-placement="top" title="Imprimir Factura" class="btn btn-warning btn-sm"
                                    href="modules/compras/print.php?act=imprimir&ped_cod=<?php echo $data['ped_cod']; ?>" target="_blank">
                                        <i style="color:#000" class="fa fa-print"></i>
                                    </a>
                                    <?php echo "
                                        </div>
                                        </td>
                                        </tr>" 
                                    ?>
                                <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>