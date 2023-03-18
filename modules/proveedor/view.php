<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class=" fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="?module=proveedor">Proveedor</a></li>
    </ol><br><hr>
    <h1>
        <i class="fa fa-folder icon-title"></i>Datos de Proveedores
        <a class="btn btn-primary btn-social pull-right" href="?module=form_proveedor&form=add" title="Agregar" data-toggle="tooltip">
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
                        <h2>Lista de Proveedores</h2>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Razon Social</th>
                                <th>RUC</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Correo Electronico</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nro=1;
                                $query=mysqli_query($mysqli, "SELECT * FROM proveedor")
                                or die('error'.mysqli_error($mysqli));

                                while($data = mysqli_fetch_assoc($query)){
                                    $prv_cod = $data['prv_cod'];
                                    $prv_razsoc = $data['prv_razsoc'];
                                    $prv_ruc = $data['prv_ruc'];
                                    $prv_dir = $data['prv_dir'];
                                    $prv_tel = $data['prv_tel'];
                                    $prv_correo = $data['prv_correo'];
                    
                                    echo "<tr>
                                    <td width='80' class='center'>$prv_cod</td>
                                    <td width='50' class='center'>$prv_razsoc</td>
                                    <td width='80' class='center'>$prv_ruc</td>
                                    <td width='80' class='center'>$prv_dir</td>
                                    <td width='80' class='center'>$prv_tel</td>
                                    <td width='80' class='center'>$prv_correo</td>
                                    
                                    <td class='center' width='100'>
                                    <div>
                                    <a data-toggle='tooltip' data-placement='top' title='Modificar Datos' style='margin-right:5px' 
                                    class='btn btn-primary btn-sm' href='?module=form_proveedor&form=edit&id=$data[prv_cod]'>
                                        <i class='glyphicon glyphicon-edit' style='color: #fff'></i> </a>";
                                    ?>
                                    <a data-toggle="tooltip" data-data-placement="top" title="Eliminar Datos" class="btn btn-danger btn-sm"  
                                        href="modules/proveedor/proses.php?act=delete&prv_cod=<?php echo $data['prv_cod']; ?>"
                                        onclick="return confirm('¿Estás seguro/a que deseas eliminar  <?php echo $data['prv_razsoc']; ?> <?php echo $data['prv_ruc']; ?> <?php echo $data['prv_dir']; ?> <?php echo $data['prv_tel']; ?> <?php echo $data['prv_correo']; ?>?')">
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