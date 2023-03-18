<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=abastecimiento">Abastecimiento</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Abastecimiento
    <a class="btn btn-primary btn-social pull-right" href="?module=form_abastecimiento&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar Abastecimiento
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
                        <h2>Lista de Abastecimiento</h2>
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Funcionario</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM ")
                            or die('Error'.mysqli_error($mysqli));

                            while($data = mysqli_fetch_assoc($query)){
                               $cod = $data['cod_abastecimiento'];
                               $fecha = $data['fecha'];
                               $hora = $data['hora'];
                               $name_user = $data['name_user'];
                               $estado = $data['estado'];



                               echo "<tr>
                               <td class='center'>$cod</td>
                               <td class='center'>$name_user</td>
                               <td class='center'>$fecha</td>
                               <td class='center'>$hora</td>
                               <td class='center'>$estado</td>
                               <td class='center' width='150'>
                               <div>";?>
                            <a data-toggle="tooltip" data-placement="top" title="Anular Abastecimiento" class="btn btn-danger btn-sm"
                             href="modules/abastecimiento/proses.php?act=anular&cod_abastecimiento=<?php echo $data['cod_abastecimiento']; ?>"
                             onclick = "return confirm('Estas seguro/a de anular <?php echo $data['fecha']; ?>  <?php echo $data['hora']; ?> <?php echo $data['name_user']; ?> <?php echo $data['estado']; ?> ?');">
                                <i style="color_#000" class="glyphicon glyphicon-trash "></i>
                             </a>

                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de abastecimiento" class="btn btn-warning btn-sm"
                              href="modules/abastecimiento/print.php?act=imprimir&cod_abastecimiento=<?php echo $data['cod_abastecimiento']; ?>" target="_blank">
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