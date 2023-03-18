<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=materia_prima">Materia Prima</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Materia Prima
    <a class="btn btn-primary btn-social pull-right" href="?module=form_materia_prima&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar Materia Prima
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
                Los datos ingresados en la tabla, ya se encuentran registrados.
                </div>";
            }
            ?>

            <div class="box box-primary">
                <div class="box-body">
                <section class="content-header">
                    <a class="btn btn-warning btn-social pull-right" href="modules/materia_prima/print.php" target="_blank">
                    <i class="fa fa-print"></i>Imprimir Reporte de Materiales.
                    </a>
                </section>
                

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Materias Primas</h2>
                        <thead>
                            <tr>
                                <th class="center">Código</th>
                                <th class="center">Especificacion de Material</th>
                                <th class="center">Tipo de Material</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM materia_prima ")
                                                            or die('Error'.mysqli_error($mysqli));
                            while($data = mysqli_fetch_assoc($query)){
                               $codigo = $data['cod_materia'];
                               $descri_materia = $data['descri_materia'];
                               $tipo_materia = $data['tipo_materia'];
                               
                               
                               echo "<tr>
                               <td class='center'>$codigo</td>
                               <td class='center'>$descri_materia</td>
                               <td class='center'>$tipo_materia</td>
                               
            

                               <td class='center' width='150'>
                               <div>
                               <a data-toggle='tooltip' data-placement='top' title='Modificar datos de Materia Prima' style='margin-right:5px' 
                               class='btn btn-primary btn-sm' href='?module=form_materia_prima&form=edit&id=$data[cod_materia]'>
                                    <i class='glyphicon glyphicon-edit' style='color:#fff'></i> </a>"
                                ?>
                                <a data-toggle="tooltip" data-data-placement="top" title="Eliminar datos" class="btn btn-danger btn-sm" 
                                href="modules/materia_prima/proses.php?act=delete&cod_materia=<?php echo $data['cod_materia']; ?>"
                                onclick="return confirm('¿Estás seguro/a de eliminar <?php echo $data['descri_materia']; ?> <?php echo $data['tipo_materia'] ?>?')">
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