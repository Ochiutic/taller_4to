<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class=" fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="?module=orden_produccion">Orden de Produccion</a></li>
    </ol><br><hr>
    <h1>
        <i class="fa fa-folder icon-title"></i>Datos de Orden
        <a class="btn btn-primary btn-social pull-right" href="?module=form_orden_produccion&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i> Agregar Orden de Produccion
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
                        <h2>Lista de Orden</h2>
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Descripcion de la Orden</th>
                                <th class="center">Presupuesto Aprobados</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nro=1;
                                $query=mysqli_query($mysqli, "SELECT * FROM v_orden")
                                or die('error 62: '.mysqli_error($mysqli));

                                while($data = mysqli_fetch_assoc($query)){
                                    $cod= $data['cod_orden'];
                                    $descri_orden = $data['descri_orden'];
                                    $descri_pedi = $data['descri_presu'];
                                    $fecha = $data['fecha'];
                                    $hora = $data['hora'];
                                    $estado_ = $data['estado_'];

                                    echo "<tr>
                                    <td class='center'>$cod</td>
                                    <td class='center'>$descri_orden</td>
                                    <td class='center'>$descri_pedi</td>
                                    <td class='center'>$fecha</td>
                                    <td class='center'>$hora</td>
                                    <td class='center'>$estado_</td>
                                    <td class='center' width='100'>
                                    <div>"; ?>
            <?php
                                    if ($data['estado_']=='activo') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="bloqueado" style="margin-right:5px" 
                            class="btn btn-warning btn-sm" href="modules/orden_produccion/proses.php?act=anular&cod_orden=<?php echo $data['cod_orden'];?>&cod_presu=<?php echo $data['cod_presu'];?>">
                            <i class="glyphicon glyphicon-remove"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="activo" style="margin-right:5px" 
                            class="btn btn-success btn-sm" href="modules/orden_produccion/proses.php?act=on&cod_orden=<?php echo $data['cod_orden'];?>&cod_presu=<?php echo $data['cod_presu'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }
                          ?>
                                    <a data-toggle="tooltip" data-placement="top" title="Imprimir Factura" class="btn btn-warning btn-sm"
                                    href="modules/orden_produccion/print.php?act=imprimir&cod_orden=<?php echo $data['cod_orden']; ?>" target="_blank">
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