<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=operarios">Operarios</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Operarios
    <a class="btn btn-primary btn-social pull-right" href="?module=form_operarios&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar
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
                echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exitoso!</h4>
                Datos Modificados correctamente
                </div>";
            }
            elseif($_GET['alert']==3){
                echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exitoso!</h4>
                Datos Eliminados correctamente
                </div>";
            }
            elseif($_GET['alert']==4){
                echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Error!</h4>
                No se pudo realizar la operación
                </div>";
            }
            elseif($_GET['alert']==5){
                echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Error!</h4>
                El dato ingresado ya se encuentra Registrado.!
                </div>";
            }
            ?>

            <div class="box box-primary">
                <div class="box-body">
                <section class="content-header">
                    <a class="btn btn-warning btn-social pull-right" href="modules/operarios/print.php" target="_blank">
                        <i class="fa fa-print"></i>Imprimir Reporte de Usuarios
                    </a>
                </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Operarios</h2>
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>CI</th>
                                <th>Numero de Legajo</th>
                                <th>Sector</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM v_operarios")
                                                            or die('Error'.mysqli_error($mysqli));
                            while($data = mysqli_fetch_assoc($query)){
                               $id_operario = $data['id_operario'];
                               $nombre= $data['nombre'];
                               $apellido= $data['apellido'];
                               $ci= $data['ci'];
                               $numero_legajo= $data['numero_legajo'];
                               $sector= $data['descrip_sector'];

                               echo "<tr>
                               <td class='center'>$id_operario</td>
                               <td class='center'>$nombre</td>
                               <td class='center'>$apellido</td>
                               <td class='center'>$ci</td>
                               <td class='center'>$numero_legajo</td>
                               <td class='center'>$sector</td>
                               <td class='center' width='150'>
                               <div>
                               <a data-toggle='tooltip' data-placement='top' title='Modificar datos de Operarios' style='margin-right:5px' 
                               class='btn btn-primary btn-sm' href='?module=form_operarios&form=edit&id=$data[id_operario]'>
                                    <i class='glyphicon glyphicon-edit' style='color:#fff'></i> </a>";
                                ?>
                                <a data-toggle="tooltip" data-data-placement="top" title="Eliminar datos" class="btn btn-danger btn-sm" 
                                href="modules/operarios/proses.php?act=delete&id_operario=<?php echo $data['id_operario']; ?>"
                                onclick="return confirm('¿Estás seguro/a de eliminar <?php echo $data['nombre']; ?> <?php echo $data['apellido']; ?> <?php echo $data['ci']; ?> <?php echo $data['numero_legajo']; ?> <?php echo $data['descrip_sector']; ?>?')">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                                <?php 
                                echo "</div>
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