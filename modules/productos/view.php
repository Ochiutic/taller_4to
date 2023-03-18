<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class=" fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="?module=productos">Productos</a></li>
    </ol><br><hr>
    <h1>
        <i class="fa fa-folder icon-title"></i>Datos de Producto
        <a class="btn btn-primary btn-social pull-right" href="?module=form_productos&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i> Agregar
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
                    echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Exitoso </h4>
                    Datos modificados correctamente.
                    </div>";
                }
                elseif($_GET['alert']==3){
                    echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Exitoso </h4>
                    Datos eliminados correctamente.
                    </div>";
                }
                elseif($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Error </h4>
                    No se pudo realizar la operación.
                    </div>";
                }
                elseif($_GET['alert']==5){
                    echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-check-circle'></i>Error </h4>
                    Los datos ingresados ya se encuentran registrados.
                    </div>";
                }
            ?>
            <div class="box box-primary">
                <div class="box-body">
                <section class="content-header">
                    <a class="btn btn-warning btn-social pull-right" href="modules/productos/print.php" target="_blank">
                        <i class="fa fa-print"></i>Imprimir
                    </a>
                </section>
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Productos</h2>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Orden de Produccion</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nro=1;
                                $query=mysqli_query($mysqli, "SELECT * FROM productos")
                                or die('error'.mysqli_error($mysqli));

                                while($data = mysqli_fetch_assoc($query)){
                                    $cod_producto = $data['cod_producto'];
                                    $descrip_producto = $data['descrip_producto'];
                                    $part_number = $data['part_number'];
                    
                                    echo "<tr>
                                    <td width='80' class='center'>$cod_producto</td>
                                    <td width='50' class='center'>$descrip_producto</td>
                                    <td width='80' class='center'>$part_number</td>
                                    
                                    <td class='center' width='100'>
                                    <div>
                                    <a data-toggle='tooltip' data-placement='top' title='Modificar Datos' style='margin-right:5px' 
                                    class='btn btn-primary btn-sm' href='?module=form_productos&form=edit&id=$data[cod_producto]'>
                                        <i class='glyphicon glyphicon-edit' style='color: #fff'></i> </a>";
                                    ?>
                                    <a data-toggle="tooltip" data-data-placement="top" title="Eliminar Datos" class="btn btn-danger btn-sm"  
                                        href="modules/productos/proses.php?act=delete&cod_producto=<?php echo $data['cod_producto']; ?>"
                                        onclick="return confirm('¿Estás seguro/a que deseas eliminar  <?php echo $data['descrip_producto']; ?> <?php echo $data['part_number']; ?>?')">
                                        <i class="glyphicon glyphicon-trash"></i>
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