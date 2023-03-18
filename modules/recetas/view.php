<section class="content-header">
<ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
    <li class="active"><a href="?module=recetas">Recetas</a></li>
</ol><br><hr>
<h1>
    <i class="fa fa-folder icon-title"></i>Datos de Recetas de Produccion
    <a class="btn btn-primary btn-social pull-right" href="?module=form_recetas&form=add" title="Agregar" data-toggle="tooltip">
        <i class="fa fa-plus"></i>Agregar Recetas de Produccion 
    </a>
</h1>
</section>
<a data-toggle='tooltip' data-placement='top' title='Modificar datos de Operarios' style='margin-right
' 
                               class='btn btn-primary btn-sm' href='?module=form_operarios&form=edit&id=$data[id_operario]'>
                                    <i class='glyphicon glyphicon-edit' style='color:#fff'></i> </a>

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
                        <h2>Lista de Pedidos</h2>
                        <thead>
                            <tr>
                                <th class="center">N° de Receta</th>
                                <th class="center">Descripcion de Receta.</th>
                                <th class="center">Tipo de Receta.</th>
                                <th class="center">Descripcion Producto</th>
                                <th class="center">N° de lote</th>
                                <th class="center">Materia Prima.</th>
                                <th class="center">Tipo Materia Prima.</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Estado</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $nro=1;
                            $query = mysqli_query($mysqli, "SELECT * FROM v_recetas ")
                            or die('Error'.mysqli_error($mysqli));

                            while($data = mysqli_fetch_assoc($query)){
                               $cod = $data['cod_recetas'];
                               $descri = $data['descri'];
                               $tipo_receta = $data['tipo_receta'];
                               $producto = $data['descrip_producto'];
                               $part = $data['part_number'];
                               $materia_prima = $data['descri_materia'];
                               $tipo_materia = $data['tipo_materia'];
                               $fecha = $data['fecha'];
                               $hora = $data['hora'];
                               $estado = $data['estado'];



                               echo "<tr>
                               <td class='center'>$cod</td>
                               <td class='center'>$descri</td>
                               <td class='center'>$tipo_receta</td>
                               <td class='center'>$producto</td>
                               <td class='center'>$part</td>
                               <td class='center'>$materia_prima</td>
                               <td class='center'>$tipo_materia</td>
                               <td class='center'>$fecha</td>
                               <td class='center'>$hora</td>
                               <td class='center'>$estado</td>
                               <td class='center' width='150'>
                               <div>"?>
                            

                             <a data-toggle="tooltip" data-placement="top" title="Imprimir factura de Pedidos" class="btn btn-warning btn-sm"
                              href="modules/pedidos/print.php?act=imprimir&cod_recetas=<?php echo $data['cod_recetas']; ?>" target="_blank">
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