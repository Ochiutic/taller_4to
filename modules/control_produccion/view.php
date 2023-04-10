<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class=" fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="?module=control">Control de Produccion por Etapas</a></li>
    </ol><br><hr>
    <h1>
        <i class="fa fa-folder icon-title"></i>Datos de Control de Produccion
        <a class="btn btn-primary btn-social pull-right" href="?module=form_control_produccion&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i> Verificar Control de Produccion por etapas.
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
                    <h4> <i class='icon fa fa-times-circle'></i>OPERACION ANULADA</h4>
                    Control de Calidad Rechazada!
                    </div>";
                }
                elseif($_GET['alert']==5){
                    echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4> <i class='icon fa fa-check-circle'></i>SE APROBO EXITOSAMENTE</h4>
                  Control de Calidad Aprobada!
                  </div>";
              }
            ?>
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                       
                    </section>
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Listas de los Controles de Produccion por Etapas</h2>
                        <thead>
                            <tr>
                                <th class="center">N° de control</th>
                                <th class="center">Descripcion del Control</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Orden de Produc. Aprob.</th>
                                <th class="center">Operario a Controlar</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>  
                        </thead>
                        <tbody>
                            <?php
                                $nro=1;
                                $query=mysqli_query($mysqli, "SELECT * FROM v_control_produc")
                                or die('error 62: '.mysqli_error($mysqli));

                                while($data = mysqli_fetch_assoc($query)){
                                    $cod= $data['cod_control'];
                                    $descri_produc = $data['descri_produc'];
                                    $fecha = $data['fecha'];
                                    $hora = $data['hora'];
                                    $descri_orden = $data['descri_orden'];
                                    $nombre = $data['nombre'];
                                    $estado = $data['estado'];

                                    echo "<tr>
                                    <td class='center'>$cod</td>
                                    <td class='center'>$descri_produc</td>
                                    <td class='center'>$fecha</td>
                                    <td class='center'>$hora</td>
                                    <td class='center'>$descri_orden</td>
                                    <td class='center'>$nombre</td>
                                    <td class='center'>$estado</td>
                                    <td class='center' width=80'>
                                    <div>"; ?>

<?php
                                    if ($data['estado']=='aprobado') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="bloqueado" style="margin-right:5px" 
                            class="btn btn-warning btn-sm" href="modules/control_produccion/proses.php?act=anular&cod_control=<?php echo $data['cod_control'];?>&cod_orden=<?php echo $data['cod_orden'];?>">
                            <i class="glyphicon glyphicon-remove"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="aprobado" style="margin-right:5px" 
                            class="btn btn-success btn-sm" href="modules/control_produccion/proses.php?act=on&cod_control=<?php echo $data['cod_control'];?>&cod_orden=<?php echo $data['cod_orden'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }
                          ?>
                                         
                              
                               <a data-toggle="tooltip" data-placement="top" title="Imprimir Reporte" class="btn btn-warning btn-sm"
                                    href="modules/control_produccion/print.php?act=imprimir&cod_control=<?php echo $data['cod_control']; ?>" target="_blank">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>